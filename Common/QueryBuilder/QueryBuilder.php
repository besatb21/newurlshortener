<?php

namespace Shortener\Common\QueryBuilder;

use \PDO;
use Shortener\Services\DB;

abstract class QueryBuilder
{
    /* Represents a partial query. A query, usually contains:

    [verb] [targets] from [table] [joins, maybe] [where clause] [order, maybe] [limit, maybe];

    */

    protected $verb;
    protected $targets;
    protected $table;
    // Joins here, not now

    protected $conditionsRaw;
    protected $conditions;

    // order here, maybe
    protected $limit;

    protected $sql;

    // Parametrized SQL string
    protected $PARAM_SQL;

    // The type of object this will retrieve
    protected $TYPE;

    public function __construct($type)
    {
        $this->TYPE = $type;
        $this->TABLE = $type::$TABLE;

        $this->pdo = DB::connection();
        $this->conditions = array();
    }

    public function withSql($sql)
    {
        $this->sql = $sql;
    }

    public function whereRaw($rawWhere)
    {  
        $this->conditionsRaw = $rawWhere;

        return $this;
    }

    protected function getWhereString() {
        $result = "";

        if ($this->conditionsRaw)
            return "where {$this->conditionsRaw}";
        
        if (count($this->conditions) > 0)
        {
            $result = "";
            foreach ($this->conditions as $cnd)
            {
                if ($result != "")
                    $result = $result . " AND ";
                
                $result = $result . "{$cnd[0]} {$cnd[1]} {$cnd[2]}";
            }

            $result = "where {$result}";
        }
        
        return $result;
    }

    public function where($f, $c, $v)
    {
        array_push($this->conditions, array($f, $c, $this->pdo->quote($v)));

        return $this;
    }
}

?>