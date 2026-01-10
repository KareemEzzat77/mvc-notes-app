<?php

namespace Main\core;

class Auth
{
    public static function check()
    {
        return Session::has('user_id');
    }

    public static function id()
    {
        return Session::get('user_id');
    }
}
