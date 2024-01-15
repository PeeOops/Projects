<?php

namespace Core;

class Validator{
    // Pure function to check whether the body value is empty with minimum and maximum value
    public static function string($value, $min = 1, $max = INF){
        // Validator::string($value,$min,$max)

        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value){
        // Validator::email('example@gmail.com')

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}