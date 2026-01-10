<?php

namespace Main\controllers;

use Main\core\Session;
use Main\core\Validator;
use Main\core\Controller;
use Main\core\AuthService;
use Main\models\User;

class AuthController extends Controller
{
    public function showRegister()
    {
        return $this->renderView('auth/register');
    }

    public function register()
    {
        $validator = new Validator($_POST);
        $validator
            ->required('username')
            ->required('email')
            ->email('email')
            ->required('password')
            ->min('password', 6);

        $errors = [];

        if ($validator->fails()) {
            $errors = $validator->errors();
        }

        $username = trim($_POST['username']);
        $email    = trim($_POST['email']);

        $userModel = new User();

        if ($userModel->findByUsername($username)) {
            $errors['username'][] = 'Username already taken';
        }

        if ($userModel->findByEmail($email)) {
            $errors['email'][] = 'Email already registered';
        }

        if (!empty($errors)) {
            Session::flash('errors', $errors);
            Session::flash('old', $_POST);
            return $this->redirect('auth/register');
        }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $userModel->addUser($username, $email, $password);

        (new AuthService())->attempt($email, $_POST['password']);
        Session::flash('success', 'تم تسجيل الحساب بنجاح');
        return $this->redirect('notes');
    }
    public function showLogin()
    {
        return $this->renderView('auth/login');
    }
    public function login()
    {
        $validator = new Validator($_POST);
        $validator
            ->required('email')
            ->email('email')
            ->required('password')
            ->min('password', 6);

        $errors = [];

        if ($validator->fails()) {
            $errors = $validator->errors();
        }

        $email    = trim($_POST['email']);
        $password = $_POST['password'];

        if (empty($errors)) {
            $auth = new AuthService();

            if (!$auth->attempt($email, $password)) {
                $errors['auth'][] = 'Invalid email or password';
            }
        }

        if (!empty($errors)) {
            Session::flash('errors', $errors);
            Session::flash('old', $_POST);
            return $this->redirect('auth/login');
        }

        return $this->redirect('notes');
    }


    public function logout()
    {
        $auth = new AuthService();
        $auth->logout();

        return $this->redirect('auth/login');
    }
}
