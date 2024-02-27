<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Query to show tasks
$tasks = $db->query('select * from tasks')->get();
// Distinct to show unique data
$dates = $db->query('select distinct date from tasks')->get();
$currentDate = date('Y-m-d');

$sortedDate = sortedArray($dates,$currentDate);


view('index.view.php',[
    'tasks' => $tasks,
    'dates' => $dates,
    'currentDate' => $currentDate,
    'sortedDate' => $sortedDate
]);
