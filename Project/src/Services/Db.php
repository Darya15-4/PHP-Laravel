<?php

namespace src\Services;

use PDO;
use PDOException;
use stdClass;

class Db {
    private PDO $connection;
    private static ?self $instance = null;

    private function __construct() {
        try {
            $dbOptionsFull = require('settings.php');
            $dbOptions = $dbOptionsFull['db'];  // <-- правильно извлекаем вложенный массив

            $dsn = 'pgsql:host=' . $dbOptions['host'] . ';port=' . ($dbOptions['port'] ?? 5432) . ';dbname=' . $dbOptions['dbname'];
            $this->connection = new PDO(
                $dsn,
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Ошибка подключения к базе данных: ' . $e->getMessage());
        }
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function executeQuery(string $sql, array $params = [], string $fetchClass = stdClass::class): ?array {
        $statement = $this->connection->prepare($sql);
        $result = $statement->execute($params);
        if (!$result) {
            return null;
        }
        return $statement->fetchAll(PDO::FETCH_CLASS, $fetchClass);
    }

    public function getPdoConnection(): PDO {
        return $this->connection;
    }
}
