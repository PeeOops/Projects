<?php


$config = require('config.php');

// New instance called $db from Database Class
$db = new Database($config['database']);

$header = 'Notes';

// Query
$notes = $db->query('select * from notes where user_id = 1')->fetchAll();


require 'views/notes.view.php';