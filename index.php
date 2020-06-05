<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
require __DIR__ . '/vendor/autoload.php';

/*BOOT */
use CoffeeCode\Router\Router;

$route = new Router(url(), ":");

/**WEB */
$route->namespace('Source\App');
$route->get('/', "Web:home");


/*Error*/
$route->namespace('Source\App')->group("/ops");
$route->get("/{errcode}", "Web:error");

/*Route*/
$route->dispatch();

/*Redirect */
if($route->error()){
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();

