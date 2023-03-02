<?php

use gaucho\Router;

function code($httpCode){
	http_response_code($httpCode);
}
function delete(...$params){
    Router::delete(...$params);
}
function dispatch(){
	Router::dispatch();
}
function get(...$params){
    Router::get(...$params);
}
function headMethod(...$params){
    Router::head(...$params);
}
function options(...$params){
    Router::options(...$params);
}
function patch(...$params){
    Router::patch(...$params);
}
function post(...$params){
    Router::post(...$params);
}
function put(...$params){
    Router::put(...$params);
}
function segment($segmentId=null){
    $str=$_SERVER["REQUEST_URI"];
    $str=@explode('?', $str)[0];
    $arr=explode('/', $str);
    $arr=array_filter($arr);
    $arr=array_values($arr);
    if(count($arr)<1){
        $segment[1]='/';
    }else{
        $i=1;
        foreach ($arr as $key => $value) {
            $segment[$i++]=$value;
        }
    }
    if(is_null($segmentId)){
        return $segment;
    }else{
        if(isset($segment[$segmentId])){
            return $segment[$segmentId];
        }else{
            return false;
        }
    }
}	
register_shutdown_function('dispatch');
