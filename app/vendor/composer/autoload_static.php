<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit85c917d7cb5c6412a95a6d33d44a7e78
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Mike42\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Mike42\\' => 
        array (
            0 => __DIR__ . '/..' . '/mike42/escpos-php/src/Mike42',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit85c917d7cb5c6412a95a6d33d44a7e78::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit85c917d7cb5c6412a95a6d33d44a7e78::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit85c917d7cb5c6412a95a6d33d44a7e78::$classMap;

        }, null, ClassLoader::class);
    }
}
