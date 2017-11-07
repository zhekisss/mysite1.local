<?php

namespace Engine\Service\Ajax;

use Engine\Service\AbstractProvider;
use Engine\Core\Ajax\Ajax;

class Provider extends AbstractProvider {
    
    /**
    * @var string
    */
    public $serviceName = 'ajax';
    
    /**
    * @return mixed
    */
    public function init(){
        
        $ajax = new Ajax();
        
        $this->di->set($this->serviceName, $ajax);
        
    }
}