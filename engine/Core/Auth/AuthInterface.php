<?php
 
namespace Engine\Core\Auth;

interface AuthInterface
{
    public function authorized();
    
    public function authorize($user);
        
    public function unAuthorize();
    
    public function encryptPassword($password);
    
    public function hashUser();
    
}
