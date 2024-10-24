<?php
// /app/controllers/AuthController.php

namespace App\Controllers;

use App\Database;
use App\Models\User;     // Импортируем класс User
use App\Models\Session;  // Импортируем класс Session

class AuthController {
    private $userModel;
    private $session;

    public function __construct() {
        $pdo = Database::getInstance();
        $this->userModel = new User($pdo);
        $this->session = new Session();
        $this->session->start();
    }

    public function showRegisterForm() {
        include __DIR__ . '/../views/register.php';
    }

    public function register() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        // Валидация
        if ($password !== $confirmPassword) {
            $error = "Пароли не совпадают.";
            include __DIR__ . '/../views/register.php';
            return;
        }

        if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
            $error = "Неверный формат имени пользователя.";
            include __DIR__ . '/../views/register.php';
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Неверный формат электронной почты.";
            include __DIR__ . '/../views/register.php';
            return;
        }

        if (strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[\W]/', $password)) {
            $error = "Пароль должен содержать минимум 8 символов, включая буквы, цифры и специальные символы.";
            include __DIR__ . '/../views/register.php';
            return;
        }

        // Хэширование пароля
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($this->userModel->create($username, $email, $hashedPassword)) {
            $success = "Регистрация прошла успешно!";
            include __DIR__ . '/../views/register.php';
        } else {
            $error = "Ошибка регистрации. Попробуйте позже.";
            include __DIR__ . '/../views/register.php';
        }
    }

    public function showLoginForm() {
        include __DIR__ . '/../views/login.php';
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set('user_id', $user['id']);
            header("Location: /profile");
            exit();
        } else {
            $error = "Неверные учетные данные.";
            include __DIR__ . '/../views/login.php';
        }
    }

    public function showResetRequestForm() {
        include __DIR__ . '/../views/reset_request.php';
    }

    public function resetRequest() {
        $email = $_POST['email'];
        $user = $this->userModel->findByEmail($email);

        if ($user) {
            $token = bin2hex(random_bytes(16));
            $this->userModel->storeToken($user['id'], $token);
            // Здесь отправьте email с ссылкой для сброса пароля
            $success = "Ссылка для восстановления пароля отправлена на вашу электронную почту.";
        } else {
            $error = "Электронная почта не найдена.";
        }

        include __DIR__ . '/../views/reset_request.php';
    }

    public function showResetPasswordForm() {
        $token = $_GET['token'];
        include __DIR__ . '/../views/reset_password.php';
    }

    public function resetPassword() {
        $token = $_POST['token'];
        $user = $this->userModel->findUserByToken($token);

        if (!$user) {
            $error = "Неверный токен.";
            include __DIR__ . '/../views/reset_password.php';
            return;
        }

        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword) {
            $error = "Пароли не совпадают.";
            include __DIR__ . '/../views/reset_password.php';
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->userModel->updatePassword($user['id'], $hashedPassword);
        $success = "Пароль успешно сброшен.";
        include __DIR__ . '/../views/login.php';
    }

    public function showProfile() {
        $userId = $this->session->get('user_id');
        if (!$userId) {
            header("Location: /login");
            exit();
        }

        $user = $this->userModel->findById($userId);
        include __DIR__ . '/../views/profile.php';
    }

    public function updateProfile() {
        $userId = $this->session->get('user_id');
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($this->userModel->update($userId, $username, $email, !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null)) {
            $success = "Профиль успешно обновлен.";
        } else {
            $error = "Ошибка обновления профиля.";
        }

        $user = $this->userModel->findById($userId);
        include __DIR__ . '/../views/profile.php';
    }

    public function logout() {
        $this->session->destroy();
        header("Location: /login");
        exit();
    }
}
