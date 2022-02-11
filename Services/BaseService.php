<?php

namespace Shortener\Services;

abstract class BaseService
{
    protected static $_instances = array();

    public static function instance()
    {
        $class = get_called_class();

        if (isset(self::$_instances[$class]))
            return self::$_instances[$class];
        else
        {
            self::$_instances[$class] = new $class();
            return self::$_instances[$class];
        }
    }
}

?>