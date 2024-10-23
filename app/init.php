<?php
// /app/init.php

require_once __DIR__ . '/../vendor/autoload.php'; // Подключаем автозагрузчик Composer

use App\Database; // Импортируем класс Database

// Подключение конфигурации
$config = require_once __DIR__ . '/config.php';

// Инициализация базы данных
try {
    $database = new Database($config); // Создаем объект Database
    // Получение соединения
    $pdo = $database->getConnection();
} catch (Exception $e) {
    die("Ошибка инициализации базы данных: " . $e->getMessage());
}

// Здесь можно добавить код для работы с базой данных
