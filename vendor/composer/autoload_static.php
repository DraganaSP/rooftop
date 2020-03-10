<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit42d9151b7497152a3ca6c5aa9ebe165d
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit42d9151b7497152a3ca6c5aa9ebe165d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit42d9151b7497152a3ca6c5aa9ebe165d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
