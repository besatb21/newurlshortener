<?php

namespace Shortener\Services;

use Shortener\Services\Configs\DBConfig;
use \PDO;

class DB extends BaseService
{
    use DBConfig;

    private $pdo;

    public function __construct() { }

    public function getConnection() {
        $dsn = "mysql:host=$this->HOST;dbname=$this->DB;charset=$this->charset";
        $pdo = new PDO($dsn, $this->USERNAME, $this->PASSWORD);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}

?>