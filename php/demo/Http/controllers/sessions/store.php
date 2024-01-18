<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Http\forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// 1. Validation
$form = new LoginForm();
if(!$form->validate($email, $password)){
    return view('sessions/create.view.php',[
        'errors' => $form->errors
    ]);
};

// 2. Find the user
$user = $db->query('select * from users where email = :email',[
    'email' => $email
])->find();

if($user){
    if(password_verify($password,$user['password'])){
        login([
            'email' => $email
        ]);
    
    
        // redirect home page
        header('location: /');
        exit();
    }
}

// 3. Match the user password



view('sessions/create.view.php',[
    'errors' => [
        'email' => 'Check your email address',
        'password' => 'Check your password'
    ]
]);
