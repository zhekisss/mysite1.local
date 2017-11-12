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
        Cookie::set('user_name', $user);
        
    }
    
    public function unAuthorize()
    {
        // Cookie::delete('auth_authorized');
        // Cookie::delete('auth_user');
        setcookie(session_name(), session_id(), time()-60*60*24);
        session_destroy();
    }
    
    /**
     * Password Verify
     *
     * @param string $password
     * @return boolean
     */
    public function encryptPassword($password, $passwordHash)
    {        

        // $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        // return $this->passwordHashed = $passwordHashed;
        return password_verify($password, $passwordHash);
    }

    public function hashUser()
    {
        return Cookie::get('auth_user');
    }
}
