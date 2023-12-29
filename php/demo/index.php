<?php

require 'function.php';
require 'Database.php';
// require 'router.php';

$config = require 'config.php';

// New instance called $db from Database Class
$db = new Database($config['database']);
// Called the query method
$posts = $db->query("select * from posts")->fetchAll();

dd($posts);