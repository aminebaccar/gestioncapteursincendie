<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6de323e0dfb0e528a2deb0c4065ecc26
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Osms\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Osms\\' => 
        array (
            0 => __DIR__ . '/..' . '/ismaeltoe/osms/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6de323e0dfb0e528a2deb0c4065ecc26::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6de323e0dfb0e528a2deb0c4065ecc26::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
