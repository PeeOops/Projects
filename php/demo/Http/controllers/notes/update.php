<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;
// Query
// Declare id using superglobal $_GET['id']
// fetch = 1 record
// 1. Find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// 2. Authentication
auth($note['user_id'] === $currentUserId);

// 3. Validate the form
$errors = [];

if(! Validator::string($_POST['body'],1,1000)){
    $errors['body'] = "Please check your input";
}

// If there is no validation errors
if(!empty($errors)){
    return view('notes/edit.view.php',[
        'header' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

// 4. Update record

$db->query("UPDATE notes set body = :body where id = :id",[
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// 5. Redirect Back

header("location: /note?id={$note['id']}");
exit();