<?php

namespace Engine\Core\Router;

/**
 * 
 */
class DispatchedRoute{
    
    private $controller;
    private $parameters;
    
    /**
     * @param string $controller
     * @param array $parameters
     */
    public function __construct($controller, $parameters = []){
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    /**
     * @return void
     */
    public function getController(){
        
        return $this->controller;
    }

    /**
     * @return void
     */
    public function getParameters(){

        return $this->parameters;
    }
}