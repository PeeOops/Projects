<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

view('tasks/create.view.php');