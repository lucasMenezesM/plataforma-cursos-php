<?php

require "../helpers.php";
require basePath("Router.php");

$router = new Router();

$uri = $_SERVER["REQUEST_URI"];

$router->route($uri);
