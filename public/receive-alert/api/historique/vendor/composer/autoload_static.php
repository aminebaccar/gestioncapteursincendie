<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit37bc516f4cc20d4fe42271dbc7421a21
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit37bc516f4cc20d4fe42271dbc7421a21::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit37bc516f4cc20d4fe42271dbc7421a21::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
