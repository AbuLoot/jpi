<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6bf7293fe9dbb204e7e306eb62eab930
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AbuLoot\\Epay\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AbuLoot\\Epay\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6bf7293fe9dbb204e7e306eb62eab930::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6bf7293fe9dbb204e7e306eb62eab930::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}