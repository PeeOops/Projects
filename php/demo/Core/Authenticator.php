<?php

namespace Core;

class Authenticator{

    public function login($user){
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
    
        // Generate session id - but not necessary
    
        session_regenerate_id(true);
    
    }
    
    public function logout(){
        // 1. Clear out the superglobal session
        $_SESSION = [];
        // 2. Destroy the session
        session_destroy();
    
        // 3. Set the cookies
            // Cookie Path & domain
    
        $params = session_get_cookie_params();
    
            // Set the cookie
        setcookie('PHPSESSID', '', time() - 3600, $params['path'] , $params['domain'], $params['secure'], $params['httponly']);
    
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