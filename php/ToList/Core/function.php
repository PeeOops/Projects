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

function sortedArray($dates, $currentDate) {
    // Separate dates into two arrays: "today" and "other"
    $todayDates = [];
    $otherDates = [];

    foreach ($dates as $date) {
        if ($date["date"] === $currentDate) {
            $todayDates[] = $date;
        } else {
            $otherDates[] = $date;
        }
    }

    // Sort "other" dates in descending order
    usort($otherDates, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });
    

    // Concatenate "today" date at the beginning of the array
    $sortedDates = array_merge($todayDates, $otherDates);

    return $sortedDates;
}
