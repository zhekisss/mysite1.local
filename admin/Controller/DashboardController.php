<?php

namespace Admin\Controller;

class DashboardController extends AdminController{


    public function dashboard(){
        
        $this->view->render('dashboard');
    }
}