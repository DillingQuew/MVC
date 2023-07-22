<?php
namespace DB\DataBase;
use PDO;
class MyPDO extends PDO
{
    public function __construct()
    {
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        parent::__construct("mysql:host=$_ENV[HOST];dbname=$_ENV[DB];charset=$_ENV[CHARSET]", $_ENV['USER'], $_ENV['PASSWORD'], $options);
    }
    public function run($sql, $args = NULL)
    {
        if (!$args)
        {
            return $this->query($sql);
        }
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}