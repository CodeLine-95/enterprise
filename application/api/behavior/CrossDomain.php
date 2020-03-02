<?php
namespace app\api\behavior;

use think\Response;

class CrossDomain{
    public function moduleInit(&$params){
        header('Access-Control-Allow-Origin: *');
        $host_name = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "*";
        $headers = [
            "Access-Control-Allow-Origin" => $host_name,
            "Access-Control-Allow-Credentials" => 'true',
            "Access-Control-Allow-Headers" => "x-token,x-uid,x-token-check,x-requested-with,content-type,Host"
        ];
        if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            $params['type'] = 'response';
            $response = Response::create()->header($headers);
            $params['response'] = $response;
        }
        $params->header = Response::create()->header($headers);
    }
}