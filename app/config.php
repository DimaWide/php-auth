<?php
// /app/config.php

return [
    'database' => [
        'host' => 'localhost',
        'dbname' => 'dev.auth-3',
        'username' => 'root',
        'password' => 'root',
        'port' => '5000',
    ],
    'session' => [
        'timeout' => 1800, // Тайм-аут сессии в секундах (30 минут)
    ],
];
