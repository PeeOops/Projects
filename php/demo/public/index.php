<?php

use Core\Router;
const BASE_PATH = __DIR__ . '/../';

// Priority Set
require BASE_PATH . 'Core/function.php';
require base_path('bootstrap.php');

spl_autoload_register(function ($class){
    // Core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

// New instance class Router
$router = new \Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Check method through view with unique name '_method' to pass DELETE, PATCH or PUT
// Because Form can only pass POST and GET request
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);



