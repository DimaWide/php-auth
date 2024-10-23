<!-- /app/views/reset_request.php -->

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
        <h2>Восстановление пароля</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form action="/reset-request" method="POST">
            <label for="email">Электронная почта</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">Отправить ссылку для восстановления пароля</button>
        </form>
        <p><a href="/login">Вернуться к входу</a></p>
    </div>
</body>
</html>
