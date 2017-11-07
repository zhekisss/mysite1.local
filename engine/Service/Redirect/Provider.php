<?php

namespace Engine\Service\Redirect;

use Engine\Service\AbstractProvider;
use Engine\Core\Redirect\Redirect;

class Provider extends AbstractProvider {
    
    /**
    * @var string
    */
    public $serviceName = 'redirect';
    
    /**
    * @return mixed
    */
    public function init(){
        
        $redirect = new Redirect();
        $this->di->set($this->serviceName, $redirect);
    }
}