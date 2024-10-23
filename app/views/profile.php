<!-- /app/views/profile.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Профиль пользователя</title>
</head>
<body>
    <div class="container">
        <h2>Профиль пользователя</h2>
        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form action="/profile" method="POST">
            <label for="username">Имя пользователя</label>
            <input type="text" name="username" id="username" value="<?= htmlspecialchars($user['username']) ?>" required>

            <label for="email">Электронная почта</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required>

            <label for="password">Новый пароль (оставьте пустым, если не хотите менять)</label>
            <input type="password" name="password" id="password">

            <label for="confirm_password">Подтверждение пароля</label>
            <input type="password" name="confirm_password" id="confirm_password">

            <button type="submit">Сохранить изменения</button>
        </form>
        <a href="/logout">Выйти</a>
    </div>
</body>
</html>
