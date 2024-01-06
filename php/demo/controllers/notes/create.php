<?php

require base_path('Validator.php');

$config = require base_path('config.php');

// New instance called $db from Database Class
$db = new Database($config['database']);
$errors = [];


if($_SERVER['REQUEST_METHOD'] === 'POST'){



    // Static class "::"
    if(! Validator::string($_POST['body'],1,1000)){
        $errors['body'] = "Please check your input";
    }

    if(empty($errors)){
        $db->query('INSERT INTO notes(body,user_id) VALUES(:body, :user_id)',[
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

}

view('notes/create.view.php',[
    'header' => 'Create Note',
    'errors' => $errors
]);