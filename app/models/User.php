<?php
// /app/models/User.php


namespace App\Models;

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($username, $email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, $password]);
    }

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $username, $email, $password = null) {
        if ($password) {
            $stmt = $this->pdo->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
            return $stmt->execute([$username, $email, $password, $id]);
        } else {
            $stmt = $this->pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
            return $stmt->execute([$username, $email, $id]);
        }
    }

    public function storeToken($userId, $token) {
        $stmt = $this->pdo->prepare("INSERT INTO password_resets (user_id, token, created_at) VALUES (?, ?, NOW())");
        return $stmt->execute([$userId, $token]);
    }

    public function findUserByToken($token) {
        $stmt = $this->pdo->prepare("SELECT users.* FROM users JOIN password_resets ON users.id = password_resets.user_id WHERE token = ?");
        $stmt->execute([$token]);
        return $stmt->fetch();
    }

    public function updatePassword($userId, $hashedPassword) {
        $stmt = $this->pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        return $stmt->execute([$hashedPassword, $userId]);
    }
}
