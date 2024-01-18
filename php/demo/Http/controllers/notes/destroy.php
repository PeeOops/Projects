<?php

use Core\App;
use Core\Response;
use Core\Database;

// Container App that resolve Database
$db = App::resolve(Database::class);


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


