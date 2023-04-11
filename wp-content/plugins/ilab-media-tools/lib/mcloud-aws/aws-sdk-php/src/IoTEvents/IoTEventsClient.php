<?php

namespace MediaCloud\Vendor\Aws\IoTEvents;
use MediaCloud\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Events** service.
 * @method \MediaCloud\Vendor\Aws\Result createAlarmModel(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createAlarmModelAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createDetectorModel(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createDetectorModelAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createInput(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createInputAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteAlarmModel(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteAlarmModelAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteDetectorModel(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteDetectorModelAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteInput(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteInputAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeAlarmModel(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeAlarmModelAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeDetectorModel(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeDetectorModelAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeDetectorModelAnalysis(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeDetectorModelAnalysisAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeInput(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeInputAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeLoggingOptions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeLoggingOptionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getDetectorModelAnalysisResults(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getDetectorModelAnalysisResultsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listAlarmModelVersions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listAlarmModelVersionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listAlarmModels(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listAlarmModelsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listDetectorModelVersions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listDetectorModelVersionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listDetectorModels(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listDetectorModelsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listInputRoutings(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listInputRoutingsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listInputs(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listInputsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result putLoggingOptions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise putLoggingOptionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result startDetectorModelAnalysis(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise startDetectorModelAnalysisAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result tagResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result untagResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateAlarmModel(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateAlarmModelAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateDetectorModel(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateDetectorModelAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateInput(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateInputAsync(array $args = [])
 */
class IoTEventsClient extends AwsClient {}
