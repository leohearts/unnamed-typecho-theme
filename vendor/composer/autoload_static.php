<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita0b17503c9da53541327bee416a043d5
{
    public static $prefixLengthsPsr4 = array (
        'k' => 
        array (
            'kornrunner\\Blurhash\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'kornrunner\\Blurhash\\' => 
        array (
            0 => __DIR__ . '/..' . '/kornrunner/blurhash/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita0b17503c9da53541327bee416a043d5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita0b17503c9da53541327bee416a043d5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita0b17503c9da53541327bee416a043d5::$classMap;

        }, null, ClassLoader::class);
    }
}