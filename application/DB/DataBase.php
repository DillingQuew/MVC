<?php
namespace DB\DataBase;
use PDO;

class DataBase extends PDO {
    private static $host = "";
    private static $db   = "";
    private static $user = "";
    private static $pass = '';
    private static $charset = '';

    private static $_instance = null;
    private function __construct() {
// приватный конструктор ограничивает реализацию getInstance ()
    }
    protected function __clone() {
// ограничивает клонирование объекта
    }
    static public function DB(): ?PDO
    {
        if(is_null(self::$_instance))
        {
            self::$host = $_ENV['HOST'];
            self::$db = $_ENV['DB'];
            self::$user = $_ENV['USER'];
            self::$pass = $_ENV['PASSWORD'];
            self::$charset = $_ENV['CHARSET'];

            $dsn = "mysql:host=" . self::$host .
                   ";dbname=" . self::$db .
                   ";charset=" . self::$charset;
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false
            ];
            self::$_instance = new PDO($dsn, self::$user, self::$pass, $opt);
        }
        return self::$_instance;
    }
}
