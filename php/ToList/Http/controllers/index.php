<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


// Query
$tasks = $db->query('select * from tasks')->get();

view('index.view.php',[
    'tasks' => $tasks
]);
