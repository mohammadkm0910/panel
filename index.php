<?php
require_once "system/Loader.php";
require_once "system/router.php";
require_once "system/ServerInfo.php";
require_once "model/CreateDb.php";
session_start();
use System\Loader;
use System\ServerInfo;
$loader = new Loader();
$loader->autoloader();
define('BASE_DIR',__DIR__);
$cd = new \Model\CreateDb();
$cd->run();
function asset($src)
{
    $domain = trim(ServerInfo::getDomain(),"/");
    $src = trim($src,"/");
    echo $domain."/panel/$src";
}
function url($url)
{
    $domain = trim(ServerInfo::getDomain(),"/");
    $url = trim($url,"/");
    echo $domain."/panel/$url";
}
uri("page-group","PageGroup","index");
uri("page-group/create","PageGroup","create");
uri("page-group/store","PageGroup","store","POST");
uri("page-group/edit/{id}","PageGroup","edit");
uri("page-group/show/{id}","PageGroup","show");
uri("page-group/update/{id}","PageGroup","update","POST");
uri("page-group/delete/{id}","PageGroup","delete");
uri("page-group/destroy/{id}","PageGroup","destroy");

uri("page","Page","index");
uri("page/create","Page","create");
uri("page/store","Page","store","POST");
uri("page/edit/{id}","Page","edit");
uri("page/update/{id}","Page","update","POST");
uri("page/show/{id}","Page","show");
uri("page/delete/{id}","Page","delete");
uri("page/destroy/{id}","Page","destroy");

uri("login","Auth","login");
uri("check-login","Auth","checkLogin","POST");
uri("register","Auth","register");
uri("register/store","Auth","registerStore","POST");
uri("logout","Auth","logout");

uri("home","Home","index");