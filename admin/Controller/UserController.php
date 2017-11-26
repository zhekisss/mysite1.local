<?php

namespace Admin\Controller;

class UserController extends AdminController
{
    public function listing()
    {
        $this->view->render('user/list');
    }
}