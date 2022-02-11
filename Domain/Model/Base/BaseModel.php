<?php

namespace Shortener\Domain\Model\Base;

use Shortener\Common\QueryBuilder\DeleteQueryBuilder;
use Shortener\Common\QueryBuilder\InsertQueryBuilder;
use Shortener\Common\QueryBuilder\SelectQueryBuilder;
use Shortener\Common\QueryBuilder\UpdateQueryBuilder;

abstract class BaseModel
{
    public static $TABLE;
    public static $FIELDS;
    public static $PRIMARY;

    protected $_fields;

    public function __construct()
    {
        $this->_fields = array();

        foreach (get_called_class()::$FIELDS as $f) {
            $this->_fields[$f] = new ModelField();
        }
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->_fields))
            return $this->_fields[$name]->getValue();
        
        return $this->$name;
    }

    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->_fields)) {
            return $this->_fields[$name]->setValue($value);
        }
        
        return $this->$name = $value;
    }

    public function getFields()
    {
        // Gets all fields but the ID

        $result = array();

        foreach ($this->_fields as $fname => $f)
        {
            if ($fname != $this::$PRIMARY)
                array_push($result, array($fname, $f));
        }

        return $result;
    }

    public function getPrimaryKeyVal()
    {
        return array($this::$PRIMARY, $this->_fields[$this::$PRIMARY]);
    }

    public function getDirtyFields()
    {
        // Gets all the dirty fields, but the ID

        $result = array();

        foreach ($this->_fields as $fname => $f)
        {
            if ($f->isDirty() && $fname != $this::$PRIMARY)
                array_push($result, array($fname, $f));
        }

        return $result;
    }

    public function hydrate($item)
    {
        foreach($item as $k => $v)
        {
            $this->_fields[$k]->setValueSilently($v);
        }

        return $this;
    }


    public static function select()
    {
        $class = get_called_class();

        $qb = new SelectQueryBuilder($class);

        return $qb;
    }

    public function insert()
    {
        // Inserts data to db:
        $qb = new InsertQueryBuilder($this);

        return $qb->execute();
    }

    public function delete()
    {
        // Delete this entity:
        $qb = new DeleteQueryBuilder($this);

        return $qb->execute();
    }
    
    public function update()
    {
        $qb = new UpdateQueryBuilder($this);

        return $qb->execute();
    }
}

?>