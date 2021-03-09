<?php


function uri($uri, $class, $method, $requestMethod = 'GET')
{
    $values = array();
    $subURIs = explode('/',strtolower($uri));
    $request_uri = array_slice(explode('/', strtolower($_SERVER['REQUEST_URI'])), 2);
    if ($request_uri[0] == "" or $request_uri[0] == "/")
        $request_uri[0] = "home";
    $isBreak = false;
    if (sizeof($request_uri) == sizeof($subURIs) and $_SERVER['REQUEST_METHOD'] == $requestMethod) {
        foreach (array_combine($subURIs, $request_uri) as $subURI => $request) {
            if ($subURI[0] == "{" and $subURI[strlen($subURI) - 1] == "}") {
                array_push($values, $request);
            } else {
                if ($subURI != $request) {
                    $isBreak = true;
                    break;
                }
            }
        }

    } else $isBreak = true;

    if (!$isBreak) {
        $class = "Controller\\" . $class;
        $object = new $class;
        if (sizeof($values) > 0) {
            if ($requestMethod == 'POST') {
                if (isset($_FILES)) {
                    $request = array_merge($_POST, $_FILES);
                    $object->$method($request, implode(',', $values));
                } else
                    $object->$method($_POST, implode(',', $values));
            } else
                $object->$method(implode(',', $values));
        } else
            if ($requestMethod == 'POST')
                if (isset($_FILES)) {
                    $request = array_merge($_POST, $_FILES);
                    $object->$method($request);
                } else
                    $object->$method($_POST);
            else
                $object->$method();
    } else {

    }
}