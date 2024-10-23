<!-- /app/views/login.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Вход</title>
</head>
<body>
    <div class="container">
        <h2>Вход</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form action="/login" method="POST">
            <label for="email">Электронная почта</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Войти</button>
        </form>
        <p>Нет аккаунта? <a href="/register">Создайте его</a></p>
        <p><a href="/reset-request">Забыли пароль?</a></p>
    </div>
</body>
</html>
