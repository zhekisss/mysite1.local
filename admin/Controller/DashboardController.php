<?php

namespace Admin\Controller;

class DashboardController extends AdminController{


    public function dashboard(){
        
        $userModel = $this->load->model('user');

        print_r($userModel);

        $this->view->render('dashboard');
    }
}