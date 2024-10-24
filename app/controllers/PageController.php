<?php
// /app/controllers/PageController.php

namespace App\Controllers;

class PageController {
    public function index() {
        require_once __DIR__ . '/../views/home.php';
    }

    public function about() {
        require_once __DIR__ . '/../views/about.php';
    }

    public function contact() {
        require_once __DIR__ . '/../views/contact.php';
    }
}
