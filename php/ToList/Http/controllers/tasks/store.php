<?php

use Core\App;
use Core\Database;

// Grab the database
$db = App::resolve(Database::class);

// Validation


// Str to Date conversion
$converteddate = strtotime($_POST['date']);
$date = date('Y:m:d',$converteddate);

// db query sql to insert data into table with values
$db->query('INSERT INTO tasks(title,date,notes) VALUES(:title, :date,:notes)',[
    'title' => $_POST['title'],
    'date' => $date,
    'notes' => $_POST['notes']
]);


// Redirect back
redirect('/');