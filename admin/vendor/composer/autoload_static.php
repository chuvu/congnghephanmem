<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit267009f7b5ec1e719ae923c6a395a56d
{
    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit267009f7b5ec1e719ae923c6a395a56d::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}