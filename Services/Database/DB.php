<?php

namespace Shortener\Services\Database;

use Shortener\Services\BaseService;
use Shortener\Configs\DBConfig;
use \PDO;

class DB extends BaseService
{
    use DBConfig;

    private $pdo;

    public function __construct() { }

    public function getConnection()
    {
        $dsn = "mysql:host=$this->HOST;dbname=$this->DB;charset=$this->CHARSET";
        $pdo = new PDO($dsn, $this->USERNAME, $this->PASSWORD);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public static function connection()
    {
        return self::instance()->getConnection();
    }
}

?>