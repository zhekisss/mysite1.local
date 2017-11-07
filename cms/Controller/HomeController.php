<?php

namespace Cms\Controller;

class HomeController extends CmsController{
    
    public function index(){
        
        $obj = [
        'db' => $this->db
        
        ];
        
        $this->view->render('index', $obj);
        
    }
    
    public function news($id = false){
        
        $obj = [
        'db'    => $this->db,
        'news'  => $id
        ];
        
        $this->view->render('news', $obj);
        
    }
}