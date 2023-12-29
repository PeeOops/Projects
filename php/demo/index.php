<?php

require 'function.php';
require 'Database.php';
// require 'router.php';





// New instance called $db from Database Class
$db = new Database();
// Called the query method
$posts = $db->query("select * from posts")->fetch(PDO::FETCH_ASSOC);




foreach ($posts as $post){
    echo "<li>" . $post['title'] ."</li>";
}