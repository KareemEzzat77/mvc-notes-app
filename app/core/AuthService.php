<?php

namespace Main\core;

use Main\models\User;

class AuthService
{
    public function attempt($email, $password)
    {
        $userModel = new User();
        $user = $userModel->FindByEmail($email);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        Session::set('user_id', $user['id']);
        return true;
    }

    public function logout()
    {
        Session::destroy();
    }
}
