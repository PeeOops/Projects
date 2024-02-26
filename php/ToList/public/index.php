<?php

use Core\Router;

// Declare a variable BASE_PATH to access base path directory
const BASE_PATH = __DIR__ . '/../';

// Connect to function.php file
require BASE_PATH . 'Core/function.php';

// Register function for new Class
spl_autoload_register(function ($path){
  // Core\Database
  $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);

  require base_path("{$path}.php");
});

// New class Router
require base_path('bootstrap.php');
$router = new Router();
// Access routes file
$routes = require base_path('routes.php');
// Define the uri
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// route method
$router->route($uri);


