<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/system_parameter.proto

namespace MediaCloud\Vendor\Google\Api;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBType;
use MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBUtil;

/**
 * ### System parameter configuration
 * A system parameter is a special kind of parameter defined by the API
 * system, not by an individual API. It is typically mapped to an HTTP header
 * and/or a URL query parameter. This configuration specifies which methods
 * change the names of the system parameters.
 *
 * Generated from protobuf message <code>google.api.SystemParameters</code>
 */
class SystemParameters extends \MediaCloud\Vendor\Google\Protobuf\Internal\Message
{
    /**
     * Define system parameters.
     * The parameters defined here will override the default parameters
     * implemented by the system. If this field is missing from the service
     * config, default system parameters will be used. Default system parameters
     * and names is implementation-dependent.
     * Example: define api key for all methods
     *     system_parameters
     *       rules:
     *         - selector: "*"
     *           parameters:
     *             - name: api_key
     *               url_query_parameter: api_key
     * Example: define 2 api key names for a specific method.
     *     system_parameters
     *       rules:
     *         - selector: "/ListShelves"
     *           parameters:
     *             - name: api_key
     *               http_header: Api-Key1
     *             - name: api_key
     *               http_header: Api-Key2
     * **NOTE:** All service configuration rules follow "last one wins" order.
     *
     * Generated from protobuf field <code>repeated .google.api.SystemParameterRule rules = 1;</code>
     */
    private $rules;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \MediaCloud\Vendor\Google\Api\SystemParameterRule[]|\Google\Protobuf\Internal\RepeatedField $rules
     *           Define system parameters.
     *           The parameters defined here will override the default parameters
     *           implemented by the system. If this field is missing from the service
     *           config, default system parameters will be used. Default system parameters
     *           and names is implementation-dependent.
     *           Example: define api key for all methods
     *               system_parameters
     *                 rules:
     *                   - selector: "*"
     *                     parameters:
     *                       - name: api_key
     *                         url_query_parameter: api_key
     *           Example: define 2 api key names for a specific method.
     *               system_parameters
     *                 rules:
     *                   - selector: "/ListShelves"
     *                     parameters:
     *                       - name: api_key
     *                         http_header: Api-Key1
     *                       - name: api_key
     *                         http_header: Api-Key2
     *           **NOTE:** All service configuration rules follow "last one wins" order.
     * }
     */
    public function __construct($data = NULL) { \MediaCloud\Vendor\GPBMetadata\Google\Api\SystemParameter::initOnce();
        parent::__construct($data);
    }

    /**
     * Define system parameters.
     * The parameters defined here will override the default parameters
     * implemented by the system. If this field is missing from the service
     * config, default system parameters will be used. Default system parameters
     * and names is implementation-dependent.
     * Example: define api key for all methods
     *     system_parameters
     *       rules:
     *         - selector: "*"
     *           parameters:
     *             - name: api_key
     *               url_query_parameter: api_key
     * Example: define 2 api key names for a specific method.
     *     system_parameters
     *       rules:
     *         - selector: "/ListShelves"
     *           parameters:
     *             - name: api_key
     *               http_header: Api-Key1
     *             - name: api_key
     *               http_header: Api-Key2
     * **NOTE:** All service configuration rules follow "last one wins" order.
     *
     * Generated from protobuf field <code>repeated .google.api.SystemParameterRule rules = 1;</code>
     * @return \MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Define system parameters.
     * The parameters defined here will override the default parameters
     * implemented by the system. If this field is missing from the service
     * config, default system parameters will be used. Default system parameters
     * and names is implementation-dependent.
     * Example: define api key for all methods
     *     system_parameters
     *       rules:
     *         - selector: "*"
     *           parameters:
     *             - name: api_key
     *               url_query_parameter: api_key
     * Example: define 2 api key names for a specific method.
     *     system_parameters
     *       rules:
     *         - selector: "/ListShelves"
     *           parameters:
     *             - name: api_key
     *               http_header: Api-Key1
     *             - name: api_key
     *               http_header: Api-Key2
     * **NOTE:** All service configuration rules follow "last one wins" order.
     *
     * Generated from protobuf field <code>repeated .google.api.SystemParameterRule rules = 1;</code>
     * @param \MediaCloud\Vendor\Google\Api\SystemParameterRule[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRules($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \MediaCloud\Vendor\Google\Protobuf\Internal\GPBType::MESSAGE, \MediaCloud\Vendor\Google\Api\SystemParameterRule::class);
        $this->rules = $arr;

        return $this;
    }

}

