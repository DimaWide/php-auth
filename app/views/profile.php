<!-- /app/views/profile.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Профиль пользователя</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-md mt-10 p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Профиль пользователя</h2>

        <?php if (isset($success)): ?>
            <div class="alert alert-success mb-4 text-green-600 text-center"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form action="/profile" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Имя пользователя</label>
                <input type="text" name="username" id="username" value="<?= htmlspecialchars($user['username']) ?>" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Электронная почта</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Новый пароль (оставьте пустым, если не хотите менять)</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="confirm_password" class="block text-gray-700">Подтверждение пароля</label>
                <input type="password" name="confirm_password" id="confirm_password" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-150">Сохранить изменения</button>
        </form>

        <p class="mt-4 text-center">
            <a href="/logout" class="text-blue-600 hover:underline">Выйти</a>
        </p>
    </div>
</body>
</html>
