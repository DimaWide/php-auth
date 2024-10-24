<!-- /app/views/login.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Вход</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-md mt-10 p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Вход</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger mb-4 text-red-600 text-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="/login" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Электронная почта</label>
                <input type="email" name="email" id="email" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500" placeholder="example@mail.com">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Пароль</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500" placeholder="Введите пароль">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-150">Войти</button>
        </form>

        <p class="mt-4 text-center">Нет аккаунта? <a href="/register" class="text-blue-600 hover:underline">Создайте его</a></p>
        <p class="mt-2 text-center"><a href="/reset-request" class="text-blue-600 hover:underline">Забыли пароль?</a></p>
    </div>
</body>
</html>
