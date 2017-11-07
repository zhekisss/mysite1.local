<?php

namespace Admin\Controller;

use \Engine\Controller;

class ErrorController extends Controller{
    
    public function page404(){
        
        header("HTTP/1.0 404 Not Found");
        $this->view->render('404');
    }
}