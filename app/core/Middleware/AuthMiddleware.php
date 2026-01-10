<?php

namespace Main\core\Middleware;

use Main\core\Auth;

class AuthMiddleware implements MiddlewareInterface
{
    public function handle()
    {
        if (!Auth::check()) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
    }
}
