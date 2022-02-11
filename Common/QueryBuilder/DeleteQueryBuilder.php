<?php

namespace Shortener\Common\QueryBuilder;

use Exception;
use \PDO;

class DeleteQueryBuilder extends QueryBuilder
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

    public function cookSql()
    { 
        $whereString = $this->getWhereString();

        return "delete from {$this->TABLE} {$whereString}";
    }

    public function execute()
    {
        $sql = $this->cookSql();
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute();

        return $result;
    }
}