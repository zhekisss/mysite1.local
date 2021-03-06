<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit791be40f92c3f54b63b53b9581bd2af7
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'E' => 
        array (
            'Engine\\DI\\' => 10,
            'Engine\\' => 7,
        ),
        'C' => 
        array (
            'Cms\\' => 4,
        ),
        'A' => 
        array (
            'Admin\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
        'Engine\\DI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine/DI',
        ),
        'Engine\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine',
        ),
        'Cms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/cms',
        ),
        'Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit791be40f92c3f54b63b53b9581bd2af7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit791be40f92c3f54b63b53b9581bd2af7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
