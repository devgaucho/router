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
	Router::dispatch();
}

function view($name,$data=false)
{
    return new View($name,$data);
}

register_shutdown_function('dispatch');
