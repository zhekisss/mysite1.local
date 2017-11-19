<?php

namespace Admin\Controller;

class PageController extends AdminController{
    
    public function listing()
    {
        $this->load->model('Page');
        $model = $this->di->get('model');
        $data = $model->page->getPages();
        $this->view->render('pages/list', $data);
        
    }
}