<?php


namespace Controller;
use System\ServerInfo;

class Controller
{
    public function __construct() {
        $auth = new Auth();
        $auth->checkAdmin();
    }
    protected function redirect($url)
    {
        $domain = trim(ServerInfo::getDomain(),"/");
        $url = trim($url,"/");
        header("Location: $domain/panel/$url");
        exit();
    }
    protected function redirectBack()
    {
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
    protected function saveImage($image,$path,$name = null)
    {
        $name = $name? $name.".".substr($image['type'],6) : date("Y-m-d-H-i-s").".".substr($image['type'],6);
        $imgTmp = $image['tmp_name'];
        $path = "public/$path/";
        if (is_uploaded_file($imgTmp)) {
            if (move_uploaded_file($imgTmp,$path.$name)){
                return $path.$name;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    protected function removeImage($path)
    {
        unlink(trim(BASE_DIR,"/")."/".trim($path,"/"));
    }
}