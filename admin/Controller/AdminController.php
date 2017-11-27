<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;
use Engine\DI\DI;

class AdminController extends Controller
{
    /**
    * @var Auth
    */
    protected $auth;

    /**
    * AdminController
    * @param \Engine\DI\DI $di
    */
    public function __construct(DI $di)
    {
        
        parent::__construct($di);
        
        // $this->auth = new Auth();
        
        if ($this->auth->hashUser() === null) {
            // header('Location: /admin/login/');
            $this->redirect->redirect('/admin/login/');
            exit;
        }
        $this->view->setData('page', $this->model->page);
        $this->view->setData('user', $this->model->user);
        if (isset($this->request->session['user_name'] )){
            $this->view->setData('authuser', $this->request->session['user_name']);
        } else {
            $user_name = new \stdClass();
            $user_name->name = 'Не авторизован';
            $this->view->setData('authuser', $user_name);
        }
    }
    
    /**
    *
    * Check authorization
    * @return void
    */
    private function checkAuthorization()
    {
        
        if (!$this->auth->authorized()) {
            header('Location: /admin/login/');
            exit;
        }
    }
    
    public function logOut()
    {
        $this->auth->unAuthorize();
        header('Location: /admin/login/');
        exit;
    }
}
