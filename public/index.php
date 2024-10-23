<?php
// /public/index.php

require_once __DIR__ . '/../app/init.php';

use AltoRouter; // Указываем полное пространство имен для AltoRouter
use App\Controllers\AuthController;

// Инициализация маршрутизатора
$router = new AltoRouter();
$authController = new AuthController();

$router->setBasePath('/');

// Определение маршрутов
$router->map('GET', '/register', 'AuthController@showRegisterForm');
$router->map('POST', '/register', 'AuthController@register');
$router->map('GET', '/login', 'AuthController@showLoginForm');
$router->map('POST', '/login', 'AuthController@login');
$router->map('GET', '/reset-request', 'AuthController@showResetRequestForm');
$router->map('POST', '/reset-request', 'AuthController@resetRequest');
$router->map('GET', '/reset-password', 'AuthController@showResetPasswordForm');
$router->map('POST', '/reset-password', 'AuthController@resetPassword');
$router->map('GET', '/profile', 'AuthController@showProfile');
$router->map('POST', '/profile', 'AuthController@updateProfile');
$router->map('GET', '/logout', 'AuthController@logout');

// Получаем текущий URL
$match = $router->match();

if ($match) {
    list($controllerName, $method) = explode('@', $match['target']);
    
    // Проверка существования контроллера
    if (class_exists($controllerName)) {
        $controllerClass = new $controllerName($pdo);
        call_user_func([$controllerClass, $method]);
    } else {
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        echo '404 Not Found: Controller not found';
    }
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo '404 Not Found';
}
