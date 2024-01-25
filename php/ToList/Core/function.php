<?php

function dd($key){
    echo '<pre>';
    var_dump($key);
    echo '</pre>';

    die();
}


function base_path($path){
    return BASE_PATH . $path;
}