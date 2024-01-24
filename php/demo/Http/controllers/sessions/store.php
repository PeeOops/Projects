<?php

use Http\forms\LoginForm;
use Core\Authenticator;
use Core\Session;


$email = $_POST['email'];
$password = $_POST['password'];

$auth = new Authenticator();

// 1. Validation
$form = new LoginForm();
if(!$form->validate($email, $password)){
    // 2. Authentication
    if($auth->attempt($email, $password)){
        redirect('/');
    }
    // 3. Error Validation
    $form->error('email','Please check your data');
    $form->error('password','Please check your data');

}

// 4. Session Flashing
Session::flash('errors',$form->errors());

Session::flash('old',[
    'email' => $email
]);

// 5. Redirect
return redirect('/login');


// return view('sessions/create.view.php',[
//     'errors' => $form->errors
// ]);


