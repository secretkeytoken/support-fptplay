<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/resource.proto

namespace MediaCloud\Vendor\Google\Api\ResourceDescriptor;

use UnexpectedValueException;

/**
 * A description of the historical or future-looking state of the
 * resource pattern.
 *
 * Protobuf type <code>google.api.ResourceDescriptor.History</code>
 */
class History
{
    /**
     * The "unset" value.
     *
     * Generated from protobuf enum <code>HISTORY_UNSPECIFIED = 0;</code>
     */
    const HISTORY_UNSPECIFIED = 0;
    /**
     * The resource originally had one pattern and launched as such, and
     * additional patterns were added later.
     *
     * Generated from protobuf enum <code>ORIGINALLY_SINGLE_PATTERN = 1;</code>
     */
    const ORIGINALLY_SINGLE_PATTERN = 1;
    /**
     * The resource has one pattern, but the API owner expects to add more
     * later. (This is the inverse of ORIGINALLY_SINGLE_PATTERN, and prevents
     * that from being necessary once there are multiple patterns.)
     *
     * Generated from protobuf enum <code>FUTURE_MULTI_PATTERN = 2;</code>
     */
    const FUTURE_MULTI_PATTERN = 2;

    private static $valueToName = [
        self::HISTORY_UNSPECIFIED => 'HISTORY_UNSPECIFIED',
        self::ORIGINALLY_SINGLE_PATTERN => 'ORIGINALLY_SINGLE_PATTERN',
        self::FUTURE_MULTI_PATTERN => 'FUTURE_MULTI_PATTERN',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(History::class, \MediaCloud\Vendor\Google\Api\ResourceDescriptor_History::class);

