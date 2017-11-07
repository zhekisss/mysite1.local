<?php

namespace Engine\Service\View;

use Engine\Service\AbstractProvider;
use Engine\Core\Template\View;
use Engine\Core\Config\Config;

class Provider extends AbstractProvider {
    
    /**
    * @var string
    */
    public $serviceName = 'view';

    private $db;

    /**
    * @return void
    */
    public function init(){
        
        
        $view = new View($this->di);
        $this->di->set($this->serviceName, $view);
        
    }
}