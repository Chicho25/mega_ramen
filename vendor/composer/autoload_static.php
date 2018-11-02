<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2462f9cd0c37e5682048db0ec1fbae19
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Statickidz\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Statickidz\\' => 
        array (
            0 => __DIR__ . '/..' . '/statickidz/php-google-translate-free/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2462f9cd0c37e5682048db0ec1fbae19::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2462f9cd0c37e5682048db0ec1fbae19::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
