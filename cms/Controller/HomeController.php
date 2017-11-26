<?php

namespace Cms\Controller;

class HomeController extends CmsController{
   
   
    public function index()
    {
        
        // $this->load->model('Page');
        // $this->load->model('User');
        
        // $model = $this->di->get('model');  
        
        // $this->view->setData('page', $this->model->page);
        // $this->view->setData('user', $this->model->user);
      
        $this->view->render('index');
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