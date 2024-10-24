<?php
// Проверяем, выполнен ли вход пользователя
$isLoggedIn = isset($_SESSION['user_id']); // Предполагается, что ID пользователя сохраняется в сессии
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto max-w-xl mt-10 p-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold mb-4 text-center text-blue-600">Добро пожаловать в приложение аутентификации!</h1>

        <?php if ($isLoggedIn): ?>
            <p class="text-lg mb-4 text-center">Вы вошли как: <strong class="text-blue-600"><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
            <div class="flex justify-center space-x-4">
                <a href="/profile" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-150">Перейти в профиль</a>
                <a href="/logout" class="inline-block bg-red-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-150">Выйти</a>
            </div>
        <?php else: ?>
            <p class="text-lg mb-4 text-center">Пожалуйста, войдите или зарегистрируйтесь:</p>
            <div class="flex justify-center space-x-4">
                <a href="/login" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-150">Войти</a>
                <a href="/register" class="inline-block bg-green-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 transition duration-150">Зарегистрироваться</a>
                <a href="/reset-password" class="inline-block bg-yellow-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-300 transition duration-150">Забыли пароль?</a>
            </div>
        <?php endif; ?>
    </div>

    <footer class="dws-footer text-center py-4 bg-gray-200 text-gray-700">
        &copy; <?php echo date("Y"); ?> 
    </footer>
</body>

</html>