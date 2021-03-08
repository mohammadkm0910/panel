<?php

namespace Controller;

use Model\Database;
use System\ServerInfo;

class Auth {
    public function login()
    {
        $domain = trim(ServerInfo::getDomain(),"/");
        $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        require_once BASE_DIR . "/template/auth/login.php";
    }
    public function checkLogin($request)
    {
        if (empty($request['email']) or empty($request['password'])) {
            $this->redirectBack();
        } else {
            $db = new Database();
            $isUser = $db->select("SELECT * FROM `users` WHERE `email` = ?; ",[$request['email']])->fetch();
            if ($isUser != null) {
                if (password_verify($request['password'],$isUser['password'])) {
                    $_SESSION['user'] = $isUser['id'];
                    $this->redirect("home");
                } else {
                    $this->redirectBack();
                }
            } else {
                $this->redirectBack();
            }
        }
    }
    public function register()
    {
        require_once BASE_DIR . "/template/auth/register.php";
    }
    public function registerStore($request)
    {
        if(empty($request['username']) or empty($request['email']) or empty($request['password'])) {
            $this->redirectBack();
        } elseif (strlen($request['password']) < 5) {
            $this->redirectBack();
        } elseif (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            $this->redirectBack();
        } else {
            $db = new Database();
            $isUser = $db->select("SELECT * FROM `users` WHERE `email` = ?; ",[$request['email']])->fetch();
            if ($isUser != null) {
                $this->redirectBack();
            } else {
                $request['password'] = password_hash($request['password'],PASSWORD_DEFAULT);
                $db->insert("users",array_keys($request),$request);
                $this->redirect("login");
            }
        }
    }
    public function logout()
    {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirectBack();
    }
    public function checkAdmin()
    {
        if (isset($_SESSION['user'])) {
            $db = new Database();
            $isUser = $db->select("SELECT * FROM `users` WHERE `id`= ?; ",[$_SESSION['user']])->fetch();
            if ($isUser != null) {
                if ($isUser['permission'] != "admin") {
                    $this->redirect('home');
                }
            } else {
                $this->redirect('home');
            }
        } else {
            $this->redirect('home');
        }
    }
    protected function redirect($url)
    {
        $domain = trim(ServerInfo::getDomain(),"/");
        $url = trim($url,"/");
        header("Location: ".$domain."/panel/$url");
        exit();
    }
    protected function redirectBack()
    {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
        exit();
    }
}