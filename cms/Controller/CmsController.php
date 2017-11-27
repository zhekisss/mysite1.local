<?php

namespace Cms\Controller;

use \Engine\Controller;

class CmsController extends Controller{
    
    /**
     * @param \Engine\DI\DI $di
     */
    public function __construct($di){
        
        parent::__construct($di);

        $this->view->setData('page', $this->model->page);
        $this->view->setData('user', $this->model->user);
        $this->view->setData('post', $this->model->post);
        $this->view->setData('routes', $this->model->routes);
    }

}