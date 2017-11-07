<?php

namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;


class Provider extends AbstractProvider {
    
    /**
    * Undocumented variable
    *
    * @var string
    */
    public $serviceName = 'db';
    
    /**
    * @return mixed
    */
    public function init(){
        
        $db = new Connection();
        $this->di->set('db', $db);

    }
}