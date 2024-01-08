<?php

use Core\Database;

$config = require base_path('config.php');

// New instance called $db from Database Class
$db = new Database($config['database']);

// Query
$notes = $db->query('select * from notes where user_id = 1')->get();

view('notes/index.view.php',[
    'header' => 'Notes',
    'notes' => $notes
]);