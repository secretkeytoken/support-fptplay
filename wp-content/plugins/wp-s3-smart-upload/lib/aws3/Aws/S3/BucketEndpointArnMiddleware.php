<?php

namespace BWPS\SSU\Aws3\Aws\S3;

use BWPS\SSU\Aws3\Aws\Api\Service;
use BWPS\SSU\Aws3\Aws\Arn\AccessPointArnInterface;
use BWPS\SSU\Aws3\Aws\Arn\ArnParser;
use BWPS\SSU\Aws3\Aws\Arn\ObjectLambdaAccessPointArn;
use BWPS\SSU\Aws3\Aws\Arn\Exception\InvalidArnException;
use BWPS\SSU\Aws3\Aws\Arn\AccessPointArn as BaseAccessPointArn;
use BWPS\SSU\Aws3\Aws\Arn\S3\OutpostsAccessPointArn;
use BWPS\SSU\Aws3\Aws\Arn\S3\OutpostsArnInterface;
use BWPS\SSU\Aws3\Aws\CommandInterface;
use BWPS\SSU\Aws3\Aws\Endpoint\PartitionEndpointProvider;
use BWPS\SSU\Aws3\Aws\Exception\InvalidRegionException;
use BWPS\SSU\Aws3\Aws\Exception\UnresolvedEndpointException;
use BWPS\SSU\Aws3\Aws\S3\Exception\S3Exception;
use InvalidArgumentException;
use BWPS\SSU\Aws3\Psr\Http\Message\RequestInterface;
/**
 * Checks for access point ARN in members targeting BucketName, modifying
 * endpoint as appropriate
 *
 * @internal
 */
class BucketEndpointArnMiddleware
{
    use EndpointRegionHelperTrait;
    /** @var callable */
    private $nextHandler;
    /** @var array */
    private $nonArnableCommands = ['CreateBucket'];
    /**
     * Create a middleware wrapper function.
     *
     * @param Service $service
     * @param $region
     * @param array $config
     * @return callable
     */
    public static function wrap(\BWPS\SSU\Aws3\Aws\Api\Service $service, $region, array $config)
    {
        return function (callable $handler) use($service, $region, $config) {
            return new self($handler, $service, $region, $config);
        };
    }
    public function __construct(callable $nextHandler, \BWPS\SSU\Aws3\Aws\Api\Service $service, $region, array $config = [])
    {
        $this->partitionProvider = \BWPS\SSU\Aws3\Aws\Endpoint\PartitionEndpointProvider::defaultProvider();
        $this->region = $region;
        $this->service = $service;
        $this->config = $config;
        $this->nextHandler = $nextHandler;
    }
    public function __invoke(\BWPS\SSU\Aws3\Aws\CommandInterface $cmd, \BWPS\SSU\Aws3\Psr\Http\Message\RequestInterface $req)
    {
        $nextHandler = $this->nextHandler;
        $op = $this->service->getOperation($cmd->getName())->toArray();
        if (!empty($op['input']['shape'])) {
            $service = $this->service->toArray();
            if (!empty($input = $service['shapes'][$op['input']['shape']])) {
                foreach ($input['members'] as $key => $member) {
                    if ($member['shape'] === 'BucketName') {
                        $arnableKey = $key;
                        break;
                    }
                }
                if (!empty($arnableKey) && \BWPS\SSU\Aws3\Aws\Arn\ArnParser::isArn($cmd[$arnableKey])) {
                    try {
                        // Throw for commands that do not support ARN inputs
                        if (in_array($cmd->getName(), $this->nonArnableCommands)) {
                            throw new \BWPS\SSU\Aws3\Aws\S3\Exception\S3Exception('ARN values cannot be used in the bucket field for' . ' the ' . $cmd->getName() . ' operation.', $cmd);
                        }
                        $arn = \BWPS\SSU\Aws3\Aws\Arn\ArnParser::parse($cmd[$arnableKey]);
                        $partition = $this->validateArn($arn);
                        $host = $this->generateAccessPointHost($arn, $req);
                        // Remove encoded bucket string from path
                        $path = $req->getUri()->getPath();
                        $encoded = rawurlencode($cmd[$arnableKey]);
                        $len = strlen($encoded) + 1;
                        if (trim(substr($path, 0, $len), '/') === "{$encoded}") {
                            $path = substr($path, $len);
                        }
                        if (empty($path)) {
                            $path = '';
                        }
                        // Set modified request
                        $req = $req->withUri($req->getUri()->withHost($host)->withPath($path));
                        // Update signing region based on ARN data if configured to do so
                        if ($this->config['use_arn_region']->isUseArnRegion()) {
                            $region = $arn->getRegion();
                        } else {
                            $region = $this->region;
                        }
                        $endpointData = $partition(['region' => $region, 'service' => $arn->getService()]);
                        $cmd['@context']['signing_region'] = $endpointData['signingRegion'];
                        // Update signing service for Outposts and Lambda ARNs
                        if ($arn instanceof OutpostsArnInterface || $arn instanceof ObjectLambdaAccessPointArn) {
                            $cmd['@context']['signing_service'] = $arn->getService();
                        }
                    } catch (InvalidArnException $e) {
                        // Add context to ARN exception
                        throw new \BWPS\SSU\Aws3\Aws\S3\Exception\S3Exception('Bucket parameter parsed as ARN and failed with: ' . $e->getMessage(), $cmd, [], $e);
                    }
                }
            }
        }
        return $nextHandler($cmd, $req);
    }
    private function generateAccessPointHost(\BWPS\SSU\Aws3\Aws\Arn\AccessPointArn $arn, \BWPS\SSU\Aws3\Psr\Http\Message\RequestInterface $req)
    {
        if ($arn instanceof OutpostsAccessPointArn) {
            $accesspointName = $arn->getAccesspointName();
        } else {
            $accesspointName = $arn->getResourceId();
        }
        $host = "{$accesspointName}-" . $arn->getAccountId();
        if ($arn instanceof OutpostsAccessPointArn) {
            $host .= '.' . $arn->getOutpostId() . '.s3-outposts';
        } else {
            if ($arn instanceof ObjectLambdaAccessPointArn) {
                if (!empty($this->config['endpoint'])) {
                    return $host . '.' . $this->config['endpoint'];
                } else {
                    $host .= '.s3-object-lambda';
                }
            } else {
                $host .= '.s3-accesspoint';
                if (!empty($this->config['dual_stack'])) {
                    $host .= '.dualstack';
                }
            }
        }
        if (!empty($this->config['use_arn_region']->isUseArnRegion())) {
            $region = $arn->getRegion();
        } else {
            $region = $this->region;
        }
        $host .= '.' . $region . '.' . $this->getPartitionSuffix($arn, $this->partitionProvider);
        return $host;
    }
    /**
     * Validates an ARN, returning a partition object corresponding to the ARN
     * if successful
     *
     * @param $arn
     * @return \Aws\Endpoint\Partition
     */
    private function validateArn($arn)
    {
        if ($arn instanceof AccessPointArnInterface) {
            // Dualstack is not supported with Outposts access points
            if ($arn instanceof OutpostsAccessPointArn && !empty($this->config['dual_stack'])) {
                throw new \BWPS\SSU\Aws3\Aws\Exception\UnresolvedEndpointException('Dualstack is currently not supported with S3 Outposts access' . ' points. Please disable dualstack or do not supply an' . ' access point ARN.');
            }
            // Accelerate is not supported with access points
            if (!empty($this->config['accelerate'])) {
                throw new \BWPS\SSU\Aws3\Aws\Exception\UnresolvedEndpointException('Accelerate is currently not supported with access points.' . ' Please disable accelerate or do not supply an access' . ' point ARN.');
            }
            // Path-style is not supported with access points
            if (!empty($this->config['path_style'])) {
                throw new \BWPS\SSU\Aws3\Aws\Exception\UnresolvedEndpointException('Path-style addressing is currently not supported with' . ' access points. Please disable path-style or do not' . ' supply an access point ARN.');
            }
            // Custom endpoint is not supported with access points
            if (!is_null($this->config['endpoint']) && !$arn instanceof ObjectLambdaAccessPointArn) {
                throw new \BWPS\SSU\Aws3\Aws\Exception\UnresolvedEndpointException('A custom endpoint has been supplied along with an access' . ' point ARN, and these are not compatible with each other.' . ' Please only use one or the other.');
            }
            // Dualstack is not supported with object lambda access points
            if ($arn instanceof ObjectLambdaAccessPointArn && !empty($this->config['dual_stack'])) {
                throw new \BWPS\SSU\Aws3\Aws\Exception\UnresolvedEndpointException('Dualstack is currently not supported with Object Lambda access' . ' points. Please disable dualstack or do not supply an' . ' access point ARN.');
            }
            // Get partitions for ARN and client region
            $arnPart = $this->partitionProvider->getPartition($arn->getRegion(), 's3');
            $clientPart = $this->partitionProvider->getPartition($this->region, 's3');
            // If client partition not found, try removing pseudo-region qualifiers
            if (!$clientPart->isRegionMatch($this->region, 's3')) {
                $clientPart = $this->partitionProvider->getPartition($this->stripPseudoRegions($this->region), 's3');
            }
            // Verify that the partition matches for supplied partition and region
            if ($arn->getPartition() !== $clientPart->getName()) {
                throw new \BWPS\SSU\Aws3\Aws\Exception\InvalidRegionException('The supplied ARN partition' . " does not match the client's partition.");
            }
            if ($clientPart->getName() !== $arnPart->getName()) {
                throw new \BWPS\SSU\Aws3\Aws\Exception\InvalidRegionException('The corresponding partition' . ' for the supplied ARN region does not match the' . " client's partition.");
            }
            // Ensure ARN region matches client region unless
            // configured for using ARN region over client region
            $this->validateMatchingRegion($arn);
            // Ensure it is not resolved to fips pseudo-region for S3 Outposts
            $this->validateFipsNotUsedWithOutposts($arn);
            return $arnPart;
        }
        throw new \BWPS\SSU\Aws3\Aws\Arn\Exception\InvalidArnException('Provided ARN was not a valid S3 access' . ' point ARN or S3 Outposts access point ARN.');
    }
}
