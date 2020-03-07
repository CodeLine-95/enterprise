<?php
namespace app\api\behavior;

use think\Response;

class CrossDomain{
    public function run(&$dispatch){
        $host_name = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "*";
        $headers = [
            "Access-Control-Allow-Origin" => $host_name,
            "Access-Control-Allow-Credentials" => 'true',
            "Access-Control-Allow-Headers" => "X-Token,x-uid,x-token-check,x-requested-with,content-type,Host"
        ];
        if($dispatch instanceof Response) {
            $dispatch->header($headers);
        } else if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            $dispatch['type'] = 'response';
            $response = new Response('', 200, $headers);
            $dispatch['response'] = $response;
        }
    }
//    public function moduleInit(&$params){
//        header('Access-Control-Allow-Origin: *');
//        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
//        $host_name = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "*";
//        $headers = [
//            "Access-Control-Allow-Origin" => $host_name,
//            "Access-Control-Allow-Credentials" => 'true',
//            "Access-Control-Allow-Headers" => "x-token,x-uid,x-token-check,x-requested-with,content-type,Host"
//        ];
//        if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//            $params['type'] = 'response';
//            $response = Response::create()->header($headers);
//            $params['response'] = $response;
//        }
//        $params->header = Response::create()->header($headers);
//    }
}