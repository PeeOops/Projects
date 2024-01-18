<?php

namespace Http\forms;

use Core\Validator;

class LoginForm{

    public $errors = [];
    public function validate($email, $password){
        // 1. Validate Form Inputs


            // Email validation
        if(!Validator::email($email)){
            $this->errors['email'] = "Please check your email address";
        }
            // Password Validation
        if(!Validator::string($password)){
            $this->errors['password'] = "Please provide a valid password";
        }

        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

}