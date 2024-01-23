<?php

namespace Core;

use Core\Session;

class Authenticator{

    public function login($user){
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
    
        // Generate session id - but not necessary
    
        session_regenerate_id(true);
    
    }
    
    public function logout(){
        Session::destroy();
    
    }

    public function attempt($email, $password){
        // Find the users
        $user = App::resolve(Database::class)->query('select * from users where email = :email',[
            'email' => $email
        ])->find();

        if($user){
            if(password_verify($password,$user['password'])){
                $this->login([
                    'email' => $email
                ]);
            
            
                // redirect
                return true;
            }
        }

        return false;
        
    }


}