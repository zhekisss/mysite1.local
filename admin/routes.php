<?php
$this->router->add('login','/admin/login','LoginController:form');
$this->router->add('auth-admin','/admin/auth','LoginController:authAdmin', 'POST');
$this->router->add('dashboard','/admin','DashboardController:dashboard');
$this->router->add('logout','/admin/logout','AdminController:logout');
$this->router->add('pages','/admin/pages','PageController:listing');
// $this->router->add('user','/admin/user','UserController:listing');
