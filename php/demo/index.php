<?php

require 'function.php';
require 'Database.php';
// require 'router.php';

$config = require('config.php');

// New instance called $db from Database Class
$db = new Database($config['database']);

$id = $_GET['id'];
$query = "select * from posts where id = ?";

// Called the query method
$posts = $db->query($query, [$id])->fetch();

dd($posts);