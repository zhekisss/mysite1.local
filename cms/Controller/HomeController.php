<?php

namespace Cms\Controller;

class HomeController extends CmsController{
   
   
    public function index()
    {
        
        // $this->load->model('Page');
        // $this->load->model('User');
        
        // $model = $this->di->get('model');
        $this->view->setData('model', $this->model);
        $this->view->render('index', $this->model);
        
    }
    
    public function news($id = false)
    {
        
        $arr = [
        'category'    => 'news',
        'id'  => $id
        ];
        
        $this->view->render('news', $arr);
        
    }
}