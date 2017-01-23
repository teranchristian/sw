<?php

namespace Helper;

class JsonResponse
{
    public static function responseSuccess($data)
    {
        $jsonResponse = array("success" => true, "response" => $data);
        $jsonResponse = json_encode($jsonResponse);
        header("Content-Type: application/json");
        echo $jsonResponse;
        exit;
    }

    public static function responseError($error)
    {
        $jsonResponse = array("success" => false, "response" => $error);
        $jsonResponse = json_encode($jsonResponse);
        header("Content-Type: application/json");
        echo $jsonResponse;
        exit;
    }

}
