<!-- /app/views/reset_password.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Сброс пароля</title>
</head>
<body>
    <div class="container">
        <h2>Сброс пароля</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form action="/reset-password" method="POST">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <label for="password">Новый пароль</label>
            <input type="password" name="password" id="password" required>

            <label for="confirm_password">Подтверждение пароля</label>
            <input type="password" name="confirm_password" id="confirm_password" required>

            <button type="submit">Сбросить пароль</button>
        </form>
        <p><a href="/login">Вернуться к входу</a></p>
    </div>
</body>
</html>
