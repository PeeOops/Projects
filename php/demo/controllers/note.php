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
])->fetch();

if(!$note){
    abort(Response::NOT_FOUND);
}

if($note['user_id'] !== $currentUserId){
    abort(Response::FORBIDDEN);
}



require 'views/note.view.php';