<?php

namespace Engine\Core\Router;


class UrlDispatcher{
    
    /**
    * @var array
    */
    private $routes = [
    'GET' => [],
    'POST' => []
    ];
    
    /**
    * @var array
    */
    private $patterns = [
    'int' => '[0-9]+',
    'str' => '[a-zA-Z\.\-_%]+',
    'any' => '[a-zA-Z0-9\.\-_%]+'
    ];
    
    /**
    * Add pattern
    *
    * @param string $key
    * @param string $pattern
    * @return void
    */
    public function addpattern($key, $pattern){
        $this->patterns[$key] = $pattern;
    }
    
    /**
    * @param string $method
    * @return void
    */
    private function routes($method){
        
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }
    
    /**
    * @param $method
    * @param $pattern
    * @param $controller
    * @return string
    */
    public function register($method, $pattern, $controller){
        
        $convert = $this->convertPattern($pattern);
        
        $this->routes[strtoupper($method)][$convert] = $controller;
    }
    
    /**
    * Undocumented function
    *
    * @param $pattern
    * @return void
    */
    private function convertPattern($pattern){
        
        if (!strpos($pattern, '(')){
            return $pattern;
        }
        return preg_replace_callback('#\((\w+):(\w+)\)#',[$this, 'replacePattern'] , $pattern);
    }
    
    /**
    * Undocumented function
    *
    * @param $matches
    * @return void
    */
    private function replacePattern($matches){
        
        return '(?<' . $matches[1] . '>' . strtr($matches[2], $this->patterns) . ')';
        
    }
    
    private function processParam($parameters){
        
        foreach ($parameters as $key => $value){
            if(is_int($key)){
                unset ($parameters[$key]);
            }
        }
        return $parameters;
    }
    
    /**
    * @param $method
    * @param $uri
    * @return void
    */
    public function dispatch($method, $uri){
        
        $routes = $this->routes(strtoupper($method));
        
        if (array_key_exists($uri, $routes)){
            
            return new DispatchedRoute($routes[$uri]);
        }
        return $this->doDispatch($method, $uri);
    }
    
    /**
    * Undocumented function
    *
    * @param $method
    * @param $uri
    * @return void
    */
    private function doDispatch($method, $uri){
        
        $uri = $this->uriFix($uri);

        $routes = $this->routes($method);
        foreach($routes as $route => $controller){
            
            $pattern = '#^' . $route . '$#s';
            
            if (preg_match($pattern, $uri, $parameters)){
                
                return new DispatchedRoute($controller, $this->processParam($parameters));
            }
        }
    }

    /**
     * Fix $uri
     *
     * @param string $uri
     * @return $uri
     */

    public function uriFix($uri)
    {
        $urilen = strlen($uri);
        $res = substr($uri, $urilen - 1);
        if ($res === '/') {
        return substr($uri, 0, $urilen - 1);
        } else {
            return $uri;
        }
    }
}

