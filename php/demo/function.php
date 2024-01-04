<?php


function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function checkUrl($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function auth($condition, $status = Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}