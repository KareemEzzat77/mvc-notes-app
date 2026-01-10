<?php

namespace Main\models;

use Main\core\BaseModel;

class User extends BaseModel
{
    public function findByUsername($username)
    {
        $this->db->query("SELECT * FROM users WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->one(); // لازم one()
    }

    public function findByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->one();
    }


    public function addUser($username, $email, $password)
    {
        $this->db->query("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        $this->db->execute();

        return $this->db->lastInsertId(); // ترجع ID المستخدم الجديد
    }


    public function verifyPassword($user, $password)
    {
        return password_verify($password, $user['password']);
    }
}
