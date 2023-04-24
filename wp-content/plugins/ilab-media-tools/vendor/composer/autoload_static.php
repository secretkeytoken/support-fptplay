<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3bdcac5365e8601e4e5e07643ff6c0d1
{
    public static $files = array (
        'a36a78a03571c7ba045ccfbb413ae093' => __DIR__ . '/../..' . '/classes/Utilities/Helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MediaCloud\\Plugin\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MediaCloud\\Plugin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3bdcac5365e8601e4e5e07643ff6c0d1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3bdcac5365e8601e4e5e07643ff6c0d1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3bdcac5365e8601e4e5e07643ff6c0d1::$classMap;

        }, null, ClassLoader::class);
    }
}
