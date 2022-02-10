<?php

namespace Shortener\Common\QueryBuilder;

abstract class QueryBuilder
{
    /* Represents a partial query. A query, usually contains:

    [verb] [targets] from [table] [joins, maybe] [where clause] [order, maybe];

    */

    protected $verb;
    protected $targets;
    protected $table;
    // Joins here, not now
    protected $conditions;
    // order here, maybe

    // Parametrized SQL string
    protected $PARAM_SQL;

    // The type of object this will retrieve
    protected $TYPE;

    public function __construct($type)
    {
        $this->TYPE = $type;
    }

    // Actually gives values to $PARAM_SQL, and returns a SQL string.
    public abstract function cook_sql();

    // Given a BaseModel, fill it with values from the query
    public function hydrate($obj) {

    }

    // Query the db:
    // Get a single result
    public abstract function first();
    // Get a list of results
    public abstract function get();
}

?>