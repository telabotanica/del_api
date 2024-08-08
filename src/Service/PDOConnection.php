<?php
namespace App\Service;
use \Pdo;

class PDOConnection extends PDO
{
    private $username="root";
    private $password="root";
    private $host ="localhost";
    private $dbname="tb_del";

    public function __construct()
    {
        parent::__construct("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8mb4", $this->username, $this->password);
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // always disable emulated prepared statement when using the MySQL driver
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}