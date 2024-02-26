<?php

use Core\Response;

function dd($key){
    echo '<pre>';
    var_dump($key);
    echo '</pre>';

    die();
}


function base_path($path){
    return BASE_PATH . $path;
}

function abort($status = 404){
    http_response_code($status);

    require base_path("views/{$status}.php");

    die();
}

function view($path, $attributes = []){

    extract($attributes);
    require base_path('views/' . $path);
}

function redirect($path){
    header('location: ' . $path);
    exit();
}