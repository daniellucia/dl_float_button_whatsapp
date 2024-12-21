<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit809238870c06f9a78c470fe467a69a11
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DanielLucia\\FloatButtonWhatsapp\\' => 32,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DanielLucia\\FloatButtonWhatsapp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit809238870c06f9a78c470fe467a69a11::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit809238870c06f9a78c470fe467a69a11::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit809238870c06f9a78c470fe467a69a11::$classMap;

        }, null, ClassLoader::class);
    }
}
