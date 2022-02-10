<?php

namespace Domain\Model\Base;

class BaseModel
{
    protected $TABLE;
    protected $FIELDS;

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
}

?>