<?php
$this->router->add('home','/','HomeController:index');
$this->router->add('news','/news','HomeController:news');
$this->router->add('news_single','/news/(id:any)','HomeController:news');