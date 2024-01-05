<?php


$config = require('config.php');

// New instance called $db from Database Class
$db = new Database($config['database']);

$header = 'Note';
$currentUserId = 1;

// Query
// Declare id using superglobal $_GET['id']
// fetch = 1 record
$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

// Authentication

auth($note['user_id'] === $currentUserId);




require 'views/notes/show.view.php';