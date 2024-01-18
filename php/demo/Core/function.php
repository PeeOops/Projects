<?php

use Core\Response;

function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function checkUrl($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($status = 404){
    http_response_code($status);

    require base_path("views/{$status}.php");

    die();
}

function auth($condition, $status = Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attributes = []){

    extract($attributes);
    require base_path('views/' . $path);
}

function login($user){
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    // Generate session id - but not necessary

    session_regenerate_id(true);

}

function logout(){
    // 1. Clear out the superglobal session
    $_SESSION = [];
    // 2. Destroy the session
    session_destroy();

    // 3. Set the cookies
        // Cookie Path & domain

    $params = session_get_cookie_params();

        // Set the cookie
    setcookie('PHPSESSID', '', time() - 3600, $params['path'] , $params['domain'], $params['secure'], $params['httponly']);

}