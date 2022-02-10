<?php

namespace Shortener\Services;

abstract class BaseService
{
    protected static $_instance;

    public static function instance()
    {
        $class = get_called_class();

        if (self::$_instance != null)
            return self::$_instance;
        else
        {
            self::$_instance = new $class();
            return self::$_instance;
        }
    }
}

?>