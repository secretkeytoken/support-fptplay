<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/consumer.proto

namespace MediaCloud\Vendor\Google\Api;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBType;
use MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBUtil;

/**
 * A descriptor for defining project properties for a service. One service may
 * have many consumer projects, and the service may want to behave differently
 * depending on some properties on the project. For example, a project may be
 * associated with a school, or a business, or a government agency, a business
 * type property on the project may affect how a service responds to the client.
 * This descriptor defines which properties are allowed to be set on a project.
 * Example:
 *    project_properties:
 *      properties:
 *      - name: NO_WATERMARK
 *        type: BOOL
 *        description: Allows usage of the API without watermarks.
 *      - name: EXTENDED_TILE_CACHE_PERIOD
 *        type: INT64
 *
 * Generated from protobuf message <code>google.api.ProjectProperties</code>
 */
class ProjectProperties extends \MediaCloud\Vendor\Google\Protobuf\Internal\Message
{
    /**
     * List of per consumer project-specific properties.
     *
     * Generated from protobuf field <code>repeated .google.api.Property properties = 1;</code>
     */
    private $properties;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \MediaCloud\Vendor\Google\Api\Property[]|\Google\Protobuf\Internal\RepeatedField $properties
     *           List of per consumer project-specific properties.
     * }
     */
    public function __construct($data = NULL) { \MediaCloud\Vendor\GPBMetadata\Google\Api\Consumer::initOnce();
        parent::__construct($data);
    }

    /**
     * List of per consumer project-specific properties.
     *
     * Generated from protobuf field <code>repeated .google.api.Property properties = 1;</code>
     * @return \MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * List of per consumer project-specific properties.
     *
     * Generated from protobuf field <code>repeated .google.api.Property properties = 1;</code>
     * @param \MediaCloud\Vendor\Google\Api\Property[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setProperties($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \MediaCloud\Vendor\Google\Protobuf\Internal\GPBType::MESSAGE, \MediaCloud\Vendor\Google\Api\Property::class);
        $this->properties = $arr;

        return $this;
    }

}

