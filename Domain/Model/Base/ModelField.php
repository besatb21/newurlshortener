<?php

namespace Shortener\Domain\Model\Base;

class ModelField
{
    private $value;
    private $dirty;

    public function __construct()
    {
        $this->value = null;
        $this->dirty = false;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($val)
    {
        $this->value = $val;
    }

    public function getirty()
    {
        return $this->dirty;
    }

    public function setDirty($dirty)
    {
        $this->dirty = $dirty;
    }
}

?>