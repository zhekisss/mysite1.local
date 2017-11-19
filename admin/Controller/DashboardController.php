<?php

namespace Admin\Controller;

class DashboardController extends AdminController{


    public function dashboard(){
        
         // Load models
         $this->load;
         
        // Load language
        // $this->load->language('dashboard/main');
        // \var_dump($this);
        
        $this->view->render('dashboard');
    }
}