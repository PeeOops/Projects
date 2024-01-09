<?php

use Core\Database;
use Core\Validator;


$config = require base_path('config.php');

// New instance called $db from Database Class
$db = new Database($config['database']);

$errors = [];

view('notes/create.view.php',[
    'header' => 'Create Note',
    'errors' => $errors
]);