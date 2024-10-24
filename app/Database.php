<?php
// /app/Database.php

namespace App;

use PDO;
use PDOException;

class Database {
    private static $instance = null; // Хранит единственный экземпляр
    private static $config = null;   // Хранит конфигурацию
    private $pdo;

    // Закрываем конструктор, чтобы предотвратить создание экземпляров извне
    private function __construct() {
        // Используем сохранённую конфигурацию для подключения
        $this->connect(self::$config);
    }

    // Метод для задания конфигурации
    public static function setConfig($config) {
        if (self::$config === null) {
            self::$config = $config;
        }
    }

    // Метод для получения экземпляра
    public static function getInstance() {
        if (self::$instance === null) {
            // Если конфигурация не установлена, выдаём ошибку
            if (self::$config === null) {
                throw new \Exception("Конфигурация базы данных не установлена.");
            }
            self::$instance = new Database();
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
