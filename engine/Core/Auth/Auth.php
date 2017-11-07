<?php

namespace Engine\Core\Auth;

use Engine\Helper\Cookie, Engine\Core\Auth\AuthInterface;

class Auth implements AuthInterface{
    
    protected $authorized = false;
    protected $user;
    protected $passwordHashed;
    
    public function __construct(){
        
        
    }
    
    public function authorized(){
        return $this->authorized;
    }
    
    public function authorize($user){
        
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', true);
    }
    
    public function unAuthorize(){
        
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');

    }
    
    public function encryptPassword($password){
        
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
        return $this->passwordHashed = $passwordHashed;
    }

    public function hashUser()
    {
        return false;
    }
}