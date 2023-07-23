<?php
namespace core;
use PDO;
abstract class Model
{
    protected static PDO $connection;
    public function __construct()
    {
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        self::$connection = new PDO ("mysql:host=$_ENV[HOST];dbname=$_ENV[DB];charset=$_ENV[CHARSET]", $_ENV['USER'], $_ENV['PASSWORD'], $options);
    }
    protected function run($sql, $args = NULL)
    {
        if (!$args)
        {
            return self::$connection->query($sql);
        }
        $stmt = self::$connection->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}