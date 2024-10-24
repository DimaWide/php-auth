<?php

namespace App;

class Router {
    private $routes = [];

    public function map($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function match($requestMethod, $requestUri) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && preg_match("#^{$route['path']}$#", $requestUri)) {
                return $route['handler'];
            }
        }
        return false;
    }
}
