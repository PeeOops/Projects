<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');

// New instance called $db from Database Class
$db = new Database($config['database']);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// Authentication

auth($note['user_id'] === $currentUserId);

$note = $db->query('delete from notes where id = :id', [
    'id' => $_GET['id']
]);

header('location: /notes');
exit();


