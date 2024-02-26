<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Query to show tasks
$tasks = $db->query('select * from tasks')->get();
$dates = $db->query('select distinct date from tasks')->get();

view('index.view.php',[
    'tasks' => $tasks,
    'dates' => $dates
]);
