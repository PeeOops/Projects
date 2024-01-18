<?php


use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$currentUserId = 1;
// Query
// Declare id using superglobal $_GET['id']
// fetch = 1 record
$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

// Authentication

auth($note['user_id'] === $currentUserId);

view('notes/edit.view.php',[
    'header' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);