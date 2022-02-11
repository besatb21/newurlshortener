<?php

namespace Shortener\Common\QueryBuilder;

use Exception;
use \PDO;

class SelectQueryBuilder extends QueryBuilder
{
    // Query the db:
    // Get a list of results
    public function get() {
        if (!$this->sql)
            $this->cookSql(null);

        // Save the type
        $type = $this->TYPE;

        $stmt = $this->pdo->prepare($this->sql);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function($row) use ($type) {
            return (new $type())->hydrate($row);
        }, $results);
    }

    // Get a single result
    public function first() {
        if (!$this->sql)
            $this->cookSql(1);

        $stmt = $this->pdo->prepare($this->sql);

        $foundAny = $stmt->execute();
        if (!$foundAny)
            throw new Exception("No results found!");

        $results = $stmt->fetch(PDO::FETCH_ASSOC);
 
        $instance = new $this->TYPE;

        // var_dump($results[0]);

        return $instance->hydrate($results);
    }


    private function getLimitString() {
        $result = "";

        if ($this->limit != null) 
        {
            // Limit included, we have offset and count
            $lm = $this->limit;

            $result = "LIMIT {$lm[0]}, {$lm[1]}";
        }

        return $result;
    }

    public function cookSql($limit)
    {
        if ($limit && !is_array($limit))
            $this->limit = array(0, $limit);
        else if($limit && is_array($limit))
            $this->limit = $limit;
        
        $lmString = $this->getLimitString();
        $whereString = $this->getWhereString();

        $this->sql = "select * from {$this->TABLE} {$whereString} $lmString";
        return $this->sql;
    }
}