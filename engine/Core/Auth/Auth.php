<?php

namespace Engine\Core\Auth;

use Engine\Helper\Cookie;
use Engine\Core\Auth\AuthInterface;

class Auth implements AuthInterface
{
    
    protected $authorized = false;
    protected $user;
    protected $passwordHashed;
    protected $password;
    protected $hash;
    
    public function __construct()
    {
    }
    
    public function authorized()
    {
        return $this->authorized;
    }
    
    public function authorize($user)
    {
        
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', true);
    }
    
    public function unAuthorize()
    {
        
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
    }
    
    public function encryptPassword($password)
    {        
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        return $this->passwordHashed = $passwordHashed;
    }

    public function hashUser()
    {
        // return password_verify($password, $hash);
        return Cookie::get('auth_user');
    }
}
