<?php

namespace Shortener\Common\QueryBuilder;

use Exception;
use \PDO;

class InsertQueryBuilder extends QueryBuilder
{
    public function __construct($entity)
    {
        parent::__construct(get_class($entity));

        $this->entity = $entity;
    }

    public function cookSql()
    {
        $dirties = $this->entity->getFields();

        $columns = '(' . implode(',', $this->getColumns($dirties)) . ')';
        $values = '(' . implode(',', $this->getValues($dirties)) . ')';

        return "INSERT INTO {$this->TABLE} $columns VALUES $values";
    }

    public function execute()
    {
        $sql = $this->cookSql();
        $stmt = $this->pdo->prepare($sql);

        // For now it only returns a bool
        // What would be reasonable would be "syncing" with the newly added item.
        return $stmt->execute();
    }
}