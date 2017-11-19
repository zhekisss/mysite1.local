<?php
namespace Engine\Core\Redirect;

class Redirect
{
    
    public function redirect($value, $time = '')
    {
        switch ($value) {
            case '404' : header("HTTP/1.0 404 Not Found");
                break;
            case '301' : header("HTTP/1.0 301");
                break;
            default : header("Location: {$value} {$time}");
        }
    }
    
}