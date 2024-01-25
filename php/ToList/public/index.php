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
$router = new Router();

// Access routes file
$routes = require base_path('routes.php');

// $router->route();


// Temporary routing
if($_SERVER['REQUEST_URI'] === '/'){
  require base_path('views/index.view.php');
};


