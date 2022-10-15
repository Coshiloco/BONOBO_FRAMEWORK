<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit8a8ea370b942b569a5b8a353bcad8d4f
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit8a8ea370b942b569a5b8a353bcad8d4f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit8a8ea370b942b569a5b8a353bcad8d4f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit8a8ea370b942b569a5b8a353bcad8d4f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
