<?php

namespace Shortener\Common\QueryBuilder;

use Exception;
use \PDO;

class UpdateQueryBuilder extends QueryBuilder
{
    // This delete is very dumb. It can't do bulk deletions.

    public function __construct($entity)
    {
        parent::__construct(get_class($entity));

        $this->entity = $entity;

        // Set up the where:
        $primKeyVal = $this->entity->getPrimaryKeyVal();
        $this->where($primKeyVal[0], '=', $primKeyVal[1]->getValue());
    }

    public function cookSql($dirties)
    {
        $columns = $this->getColumns($dirties);
        $values = $this->getValues($dirties);

        $updates = array();

        for($i = 0; $i < count($columns); $i++)
        {
            array_push($updates, "{$columns[$i]}={$values[$i]}");
        }

        $updatesStr = implode(',', $updates);

        $whereString = $this->getWhereString();

        return "UPDATE {$this->TABLE} SET {$updatesStr} {$whereString}";
    }


    public function execute()
    {
        $dirties = $this->entity->getDirtyFields();

        if (count($dirties) == 0)
            return false;

        $sql = $this->cookSql($dirties);
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

}