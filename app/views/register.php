<!-- /app/views/register.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Регистрация</title>
</head>
<body>
    <div class="container">
        <h2>Регистрация</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form action="/register" method="POST">
            <label for="username">Имя пользователя</label>
            <input type="text" name="username" id="username" required>

            <label for="email">Электронная почта</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>

            <label for="confirm_password">Подтверждение пароля</label>
            <input type="password" name="confirm_password" id="confirm_password" required>

            <button type="submit">Зарегистрироваться</button>
        </form>
        <p>Уже есть аккаунт? <a href="/login">Войдите</a></p>
    </div>
</body>
</html>
