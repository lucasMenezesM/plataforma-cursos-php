<?php
require "../helpers.php";
require basePath("vendor/autoload.php");
require basePath("Router.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(basePath(""));
$dotenv->load();

// require "../vendor/autoload.php";
// inspectAndDie(basePath("vendor/autoload.php"));

$router = new Router();

$uri = $_SERVER["REQUEST_URI"];

$router->route($uri);
