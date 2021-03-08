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
}