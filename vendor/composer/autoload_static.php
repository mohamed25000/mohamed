<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitce664058e1c0e9b76337c4bc54d79808
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitce664058e1c0e9b76337c4bc54d79808::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitce664058e1c0e9b76337c4bc54d79808::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitce664058e1c0e9b76337c4bc54d79808::$classMap;

        }, null, ClassLoader::class);
    }
}
