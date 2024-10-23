<?php
// /app/models/Session.php

namespace App\Models;

class Session {
    public function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function destroy() {
        session_start();
        $_SESSION = [];
        session_destroy();
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public function exists($key) {
        return isset($_SESSION[$key]);
    }

    public function timeout($timeout) {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout)) {
            $this->destroy();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    }
}
