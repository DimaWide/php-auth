<?php
// /app/Database.php

namespace App;

use PDO;
use PDOException;

class Database {
    private static $instance = null; // Хранит единственный экземпляр
    private $pdo;

    // Закрываем конструктор, чтобы предотвратить создание экземпляров извне
    private function __construct($config) {
        $this->connect($config);
    }

    // Метод для получения экземпляра
    public static function getInstance($config) {
        if (self::$instance === null) {
            self::$instance = new Database($config);
        }
        return self::$instance->getConnection(); // Возвращаем объект PDO
    }

    private function connect($config) {
        try {
            // Определение параметров подключения
            $host = $config['database']['host'];
            $dbname = $config['database']['dbname'];
            $username = $config['database']['username'];
            $password = $config['database']['password'];
            $port = $config['database']['port'] ?? 3306; // Использовать порт 3306 по умолчанию

            // Создание подключения к базе данных
            $this->pdo = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
