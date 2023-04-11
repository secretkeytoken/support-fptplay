<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/vision/v1/image_annotator.proto

namespace MediaCloud\Vendor\Google\Cloud\Vision\V1;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBType;
use MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBUtil;

/**
 * A list of file annotation responses.
 *
 * Generated from protobuf message <code>google.cloud.vision.v1.BatchAnnotateFilesResponse</code>
 */
class BatchAnnotateFilesResponse extends \MediaCloud\Vendor\Google\Protobuf\Internal\Message
{
    /**
     * The list of file annotation responses, each response corresponding to each
     * AnnotateFileRequest in BatchAnnotateFilesRequest.
     *
     * Generated from protobuf field <code>repeated .google.cloud.vision.v1.AnnotateFileResponse responses = 1;</code>
     */
    private $responses;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \MediaCloud\Vendor\Google\Cloud\Vision\V1\AnnotateFileResponse[]|\Google\Protobuf\Internal\RepeatedField $responses
     *           The list of file annotation responses, each response corresponding to each
     *           AnnotateFileRequest in BatchAnnotateFilesRequest.
     * }
     */
    public function __construct($data = NULL) { \MediaCloud\Vendor\GPBMetadata\Google\Cloud\Vision\V1\ImageAnnotator::initOnce();
        parent::__construct($data);
    }

    /**
     * The list of file annotation responses, each response corresponding to each
     * AnnotateFileRequest in BatchAnnotateFilesRequest.
     *
     * Generated from protobuf field <code>repeated .google.cloud.vision.v1.AnnotateFileResponse responses = 1;</code>
     * @return \MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * The list of file annotation responses, each response corresponding to each
     * AnnotateFileRequest in BatchAnnotateFilesRequest.
     *
     * Generated from protobuf field <code>repeated .google.cloud.vision.v1.AnnotateFileResponse responses = 1;</code>
     * @param \MediaCloud\Vendor\Google\Cloud\Vision\V1\AnnotateFileResponse[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setResponses($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \MediaCloud\Vendor\Google\Protobuf\Internal\GPBType::MESSAGE, \MediaCloud\Vendor\Google\Cloud\Vision\V1\AnnotateFileResponse::class);
        $this->responses = $arr;

        return $this;
    }

}

