<?php


namespace Model;
use Model\Database;
use PDO;

class UserModel
{
    public function getUsernameById($id)
    {
        $db = new Database();
        $user = $db->select("SELECT `username` FROM users WHERE id= ? ;",[$id])->fetch();
        return $user['username'];
    }
    public function getIdLoginUser(){
        if (isset($_COOKIE['user']) and $_COOKIE['user'] != "") {
            return $_COOKIE['user'];
        } else {
            return $_SESSION['user'];
        }
    }
}