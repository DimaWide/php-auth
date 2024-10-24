<?php
// /public/index.php
ini_set('error_reporting', 0);
error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); 
require_once __DIR__ . '/../app/init.php';

use App\Router;
use App\Controllers\AuthController;
use App\Controllers\PageController;

// Инициализация маршрутизатора
$router = new Router();
$authController = new AuthController();
$pageController = new PageController();

// Определение маршрутов
$router->map('GET', '/', [$pageController, 'index']);
$router->map('GET', '/register', [$authController, 'showRegisterForm']);
$router->map('POST', '/register', [$authController, 'register']);
$router->map('GET', '/login', [$authController, 'showLoginForm']);
$router->map('POST', '/login', [$authController, 'login']);
$router->map('GET', '/reset-request', [$authController, 'showResetRequestForm']);
$router->map('POST', '/reset-request', [$authController, 'resetRequest']);
$router->map('GET', '/reset-password', [$authController, 'showResetPasswordForm']);
$router->map('POST', '/reset-password', [$authController, 'resetPassword']);
$router->map('GET', '/profile', [$authController, 'showProfile']);
$router->map('POST', '/profile', [$authController, 'updateProfile']);
$router->map('GET', '/logout', [$authController, 'logout']);

// Получаем текущий URL
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = strtok($_SERVER['REQUEST_URI'], '?'); // Убираем GET параметры

$handler = $router->match($requestMethod, $requestUri);

if ($handler) {
    list($controller, $method) = $handler;
    
    // Проверка существования контроллера
    if (is_object($controller) && method_exists($controller, $method)) {
        call_user_func([$controller, $method]);
    } else {
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        echo '404 Not Found: Controller method not found';
    }
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo '404 Not Found';
}
