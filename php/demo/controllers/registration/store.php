<?php

use Core\App;
use Core\Validator;
use Core\Database;


$email = $_POST['email'];
$password = $_POST['password'];

// 1. Validate Form Inputs
$errors = [];

    // Email validation
if(!Validator::email($email)){
    $errors['email'] = "Please check your email address";
}
    // Password Validation
if(!Validator::string($password,7,255)){
    $errors['password'] = "Please check your password";
}
    // If errors != empty -> redirect to create.view.php -> show errors
if(!empty($errors)){
    return view('registration/create.view.php',[
        'errors' => $errors
    ]);
}

// 2. Check email that already exists
    // Database
$db = App::resolve(Database::class);
    // Select all users with corresponding email and find
$user = $db->query('select * from users where email = :email',[
    'email' => $email
])->find();


    // Check if user exist
if($user){
    // if yes, redirect to login page
    header('location: /');
    exit();

}else{
    // if no, save account to the database and login then redirect
    $db->query("INSERT INTO users(email,password) VALUES (:email, :password) ",[
        'email' => $email,
        'password' => $password
    ]);

    // Create user session
    $_SESSION['user'] = [
      'email' => $email
    ];

    header('location: /');
    exit();
}
    