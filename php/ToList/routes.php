<?php

// Home Page
$router->get('/','index.php');

$router->get('/task/create','tasks/create.php');
$router->post('/task/store','tasks/store.php');

