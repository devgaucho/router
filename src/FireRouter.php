<?php

use gaucho\Router;

function code($httpCode){
	http_response_code($httpCode);
}
function delete(...$params){
    Router::delete(...$params);
}
function dispatch(){
	if(!isCli()){
		Router::dispatch();
	}
}
function get(...$params){
    Router::get(...$params);
}
function headMethod(...$params){
    Router::head(...$params);
}
function isCli(){
	if (php_sapi_name() == "cli") {
		return true;
	} else {
		return false;
	}
}
function json($data,$print=true){
	$str=json_encode($data,JSON_PRETTY_PRINT);
	if($print){
	    header('Content-Type: application/json');
	    die($str);
	}else{
		return $str;
	}
}
function mustache($templateName,$data='',$print=true){
	$str=__DIR__.'/../../../../view/'.$templateName.'.html';
	$str=realpath($str);
	if(file_exists($str)){
		$obj=new Mustache_Engine(['entity_flags'=>ENT_QUOTES]);	
		$str=file_get_contents($str);
		$str=$obj->render($str,$data);
		if($print){
			print $str;
		}else{
			return $str;
		}	
	}else{
		die('template <b>'.$templateName.'</b> not found');
	}
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
function showErrors($bool=true){
    if($bool){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }else{
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }
}
function view($name,$data='',$print=true){
	return mustache($name,$data,$print);
}
register_shutdown_function('dispatch');
