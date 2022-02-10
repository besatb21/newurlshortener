<?php

namespace Shortener\Domain\Model\Base;

abstract class BaseModel
{
    protected $TABLE;
    protected $FIELDS;
    protected $PRIMARY;

    protected $_fields;

    public function __construct()
    {
        $this->_fields = array();
        foreach ($this->FIELDS as $f) {
            $_fields[$f] = new ModelField();
        }
    }

    public function __get($name)
    {
        ;
    }

    public function __set($name, $value)
    {
        ;
    }

    public static function select() {
        
    }

    public static function update() {}
    
    public static function delete() {}
}

?>