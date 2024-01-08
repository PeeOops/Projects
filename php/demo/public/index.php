<?php

const BASE_PATH = __DIR__ . '/../';

// Priority Set
require BASE_PATH . 'Core/function.php';

spl_autoload_register(function ($class){
    // Core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('Core/router.php');

