<?php
$header = 'Create Note';

$config = require('config.php');

// New instance called $db from Database Class
$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $db->query('INSERT INTO notes(body,user_id) VALUES(:body, :user_id)',[
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
}

require 'views/note-create.view.php';