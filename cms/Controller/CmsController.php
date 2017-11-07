<?php

namespace Cms\Controller;

use \Engine\Controller;

class CmsController extends Controller{
    
    /**
     * @param \Engine\DI\DI $di
     */
    public function __construct($di){
        
        parent::__construct($di);
    }

}