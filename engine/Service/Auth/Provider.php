<?php

namespace Engine\Service\Auth;

use Engine\Service\AbstractProvider;
use Engine\Core\Auth\Auth;

class Provider extends AbstractProvider {
    
    /**
    * @var string
    */
    public $serviceName = 'auth';
    
    /**
    * @return mixed
    */
    public function init(){
        
        $auth = new Auth();
        
        $this->di->set($this->serviceName, $auth);
        
    }
}