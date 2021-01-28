<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1d53fdb9161e5274ed909c948822c9b1
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MVC\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MVC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1d53fdb9161e5274ed909c948822c9b1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1d53fdb9161e5274ed909c948822c9b1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
