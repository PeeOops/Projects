<?php

$routes = require base_path('routes.php');

function routeToController($uri, $routes){
    if(array_key_exists($uri,$routes)){
        require base_path($routes[$uri]);
    }else{
        abort();
    }
}

function abort($statusCode = 404){
    http_response_code($statusCode);

    require base_path("views/{$statusCode}.php");

    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($uri, $routes);

