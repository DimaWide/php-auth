<!-- /app/views/register.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-md mt-10 p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">Регистрация</h2>
        
        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Ошибка!</strong>
                <span class="block sm:inline"><?= htmlspecialchars($error) ?></span>
            </div>
        <?php endif; ?>
        
        <?php if (isset($success)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Успех!</strong>
                <span class="block sm:inline"><?= htmlspecialchars($success) ?></span>
            </div>
        <?php endif; ?>
        
        <form action="/register" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Имя пользователя</label>
                <input type="text" name="username" id="username" value="<?= isset($username) ? htmlspecialchars($username) : '' ?>" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-400 transition duration-150 hover:border-blue-400" placeholder="Введите имя пользователя">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Электронная почта</label>
                <input type="email" name="email" id="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-400 transition duration-150 hover:border-blue-400" placeholder="Введите электронную почту">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-400 transition duration-150 hover:border-blue-400" placeholder="Введите пароль">
            </div>

            <div class="mb-4">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Подтверждение пароля</label>
                <input type="password" name="confirm_password" id="confirm_password" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-400 transition duration-150 hover:border-blue-400" placeholder="Подтвердите пароль">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-150">Зарегистрироваться</button>
        </form>

        <p class="mt-4 text-center text-gray-600">Уже есть аккаунт? <a href="/login" class="text-blue-600 hover:underline">Войдите</a></p>
    </div>
</body>
</html>
