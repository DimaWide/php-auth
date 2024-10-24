<!-- /app/views/reset_password.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Сброс пароля</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-md mt-10 p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Сброс пароля</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger mb-4 text-red-600 text-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
            <div class="alert alert-success mb-4 text-green-600 text-center"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form action="/reset-password" method="POST">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Новый пароль</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="confirm_password" class="block text-gray-700">Подтверждение пароля</label>
                <input type="password" name="confirm_password" id="confirm_password" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-150">Сбросить пароль</button>
        </form>

        <p class="mt-4 text-center">
            <a href="/login" class="text-blue-600 hover:underline">Вернуться к входу</a>
        </p>
    </div>
</body>
</html>
