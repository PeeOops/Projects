<?php

require 'Validator.php';

$header = 'Create Note';

$config = require('config.php');

// New instance called $db from Database Class
$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = [];

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

require 'views/notes/create.view.php';