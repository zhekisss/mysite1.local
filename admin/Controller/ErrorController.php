<?php

namespace Admin\Controller;

use \Engine\Controller;

class ErrorController extends Controller{
    
    public function page404(){
        
        $this->redirect->redirect('404');
        $this->view->render('404');
    }
}