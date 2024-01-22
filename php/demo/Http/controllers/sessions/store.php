<?php

use Http\forms\LoginForm;
use Core\Authenticator;


$email = $_POST['email'];
$password = $_POST['password'];

// 1. Validation
$form = new LoginForm();
if(!$form->validate($email, $password)){
    return view('sessions/create.view.php',[
        'errors' => $form->errors
    ]);
}


// 2. Authentication
$auth = new Authenticator();

if($auth->attempt($email, $password)){
    redirect('/');
}else{
    view('sessions/create.view.php',[
        'errors' => [
            'email' => 'Check your email address',
            'password' => 'Check your password'
        ]
    ]);
}

