<?php

namespace Cms\Controller;

class ErrorController extends CmsController{

    public function page404(){
        $this->redirect->redirect(404);
        $this->view->render('404');
    }
}