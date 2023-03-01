<?php

use gaucho\Router;

function get(...$params)
{
    Router::get(...$params);
}
function post(...$params)
{
    Router::post(...$params);
}
function put(...$params)
{
    Router::put(...$params);
}
function patch(...$params)
{
    Router::patch(...$params);
}
function delete(...$params)
{
    Router::delete(...$params);
}
function options(...$params)
{
    Router::options(...$params);
}
function headMethod(...$params)
{
    Router::head(...$params);
}

function dispatch()
{
    try {
        Router::dispatch();
    } catch (Exception $e) {
    	if(
    		isset($_ENV['SHOW_ERRORS']) and
    		$_ENV['SHOW_ERRORS']
    	){	
	        $whoops = new \Whoops\Run;
    	    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    	    $whoops->handleException($e);
		}	    
    }
}

function view($name,$data=false)
{
    return new View($name,$data);
}

register_shutdown_function('dispatch');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
