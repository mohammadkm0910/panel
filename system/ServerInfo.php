<?php

namespace System;

class ServerInfo
{
    const DB_HOST = "localhost";
    const DB_NAME = "my_blog";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "";
    public static function getProtocol()
    {
        return sprintf("%s://",stripos($_SERVER['SERVER_PROTOCOL'],"https") === 0 ? "https" : "http");
    }
    public static function getDomain() 
    {
        return self::getProtocol().$_SERVER['HTTP_HOST'];
    }
}
