<?php

namespace Engine\Core\Router;

use Engine\Core\Config\Config;


class Router{
    
    private $routes = [];
    private $host = 'localhost';
    private $dispatcher;
    public function  __construct(){

        $host = Config::file('main');
        if
        (isset ($host['host'])){

        $this->host = $host['host'];
        }

    }
    
    /**
    * @param string $key
    * @param string $pattern
    * @param string $controller
    * @param string $method
    * @return array
    */
    public function add($key, $pattern, $controller, $method = 'GET'){
        
        $this->routes[$key] = [
        'pattern' => $pattern,
        'controller' => $controller,
        'method' => $method
        ];
    }
    
    /**
    * @param $method
    * @param $uri
    * @return string
    */
    public function dispatch($method, $uri){
        return $this->getDispatcher()->dispatch($method, $uri);
    }
    
    /**
    * @return void
    */
    public function getDispatcher(){
        if ($this->dispatcher === null){
            $this->dispatcher = new UrlDispatcher();
            
            foreach($this->routes as $route){
            
                $this->dispatcher->register($route['method'],$route['pattern'],$route['controller']);
            }
        }
        
        return $this->dispatcher;
    }
}