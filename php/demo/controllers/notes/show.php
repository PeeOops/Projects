<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');

// New instance called $db from Database Class
$db = new Database($config['database']);

$currentUserId = 1;

// Query
// Declare id using superglobal $_GET['id']
// fetch = 1 record
$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

// Authentication

auth($note['user_id'] === $currentUserId);




view('notes/show.view.php',[
    'header' => 'Note',
    'note' => $note
]);