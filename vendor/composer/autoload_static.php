<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit469b1d116d91e51a5404b98b44535727
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit469b1d116d91e51a5404b98b44535727::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit469b1d116d91e51a5404b98b44535727::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit469b1d116d91e51a5404b98b44535727::$classMap;

        }, null, ClassLoader::class);
    }
}
