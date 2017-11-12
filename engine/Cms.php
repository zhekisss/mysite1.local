<?php
namespace Engine;

use Engine\Helper\Common;
use Engine\Core\Router\DispatchedRoute;

class Cms
{

    /**
    * @var DI
    */
    private $di;

    public $router;
//    public $db;
//    public $config;
//    public $auth;
//    public $request;
//    public $ajax;
//    public $redirect;

    /**
    * Cms constructor
    *
    * @param mixed $di
    */
    public function __construct($di)
    {
        $this->di       = $di;
        $this->router   = $this->di->get('router');
    }

    /**
    * Запуск CMS
    *
    * @return void
    */
    public function run()
    {

        try {
            require_once __DIR__.'/../'. strtolower(ENV) .'/routes.php';
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            if (!$routerDispatch) {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);
            $controller = '\\'. ENV .'\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);
        } catch (Exception $e) {
            echo 'Что-то пошло не так! '.$e->getMessage();
        }
    }
}
