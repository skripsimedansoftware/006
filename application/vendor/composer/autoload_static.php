<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0eb825fea8f28830b0e3d85ab44b58f0
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Midtrans\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Midtrans\\' => 
        array (
            0 => __DIR__ . '/..' . '/midtrans/midtrans-php/Midtrans',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0eb825fea8f28830b0e3d85ab44b58f0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0eb825fea8f28830b0e3d85ab44b58f0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0eb825fea8f28830b0e3d85ab44b58f0::$classMap;

        }, null, ClassLoader::class);
    }
}
