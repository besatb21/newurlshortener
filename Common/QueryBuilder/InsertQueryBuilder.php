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

    private function getColumns($dirties)
    {
        return array_map(function ($dirty) {
            return $dirty[0];
        }, $dirties);
    }

    private function getValues($dirties)
    {
        return array_map(function ($dirty) {
            $val = $dirty[1]->getValue();
            if ($val == '' || $val == null)
                return 'NULL';

            return $this->pdo->quote($dirty[1]->getValue());
        }, $dirties);
    }

    public function cookSql()
    {
        $dirties = $this->entity->getFields();

        $columns = '(' . implode(',', $this->getColumns($dirties)) . ')';
        $values = '(' . implode(',', $this->getValues($dirties)) . ')';

        return "insert into {$this->TABLE} $columns VALUES $values";
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