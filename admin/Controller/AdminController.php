<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;
use Engine\DI\DI;



class AdminController extends Controller{
    
    /**
    * @var Auth
    */
    protected $auth;
    

    /**
    * AdminController
    * @param \Engine\DI\DI $di
    */
    public function __construct(DI $di){
        
        parent::__construct($di);
        
        $this->auth = new Auth();
        
        if ($this->auth->hashUser() === false){            
            
            header('Location: /admin/login/');
            
            exit;
        }
        
    }
    
    /**
    *
    * Check authorization
    * @return void
    */
    public function checkAuthorization(){
        
        if(!$this->auth->authorized()){
            
            header('Location: /admin/login/');
            exit;
        }
    }
    
    public function logOut()
    {
        $this->auth->unAuthorize();
        header('Location: /admin/login/');
    }
}