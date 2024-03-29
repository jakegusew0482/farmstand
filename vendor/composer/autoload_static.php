<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2dfd1077027201e459e0321e7fd5fa95
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2dfd1077027201e459e0321e7fd5fa95::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2dfd1077027201e459e0321e7fd5fa95::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2dfd1077027201e459e0321e7fd5fa95::$classMap;

        }, null, ClassLoader::class);
    }
}
