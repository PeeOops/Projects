<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

// Static class "::"
if(! Validator::string($_POST['body'],1,1000)){
    $errors['body'] = "Please check your input";
}

if(!empty($errors)){
    return view('notes/create.view.php',[
        'header' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body,user_id) VALUES(:body, :user_id)',[
    'body' => $_POST['body'],
    'user_id' => 1
]);

header('location: /notes');
exit();

