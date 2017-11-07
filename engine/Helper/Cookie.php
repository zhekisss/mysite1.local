<?php

namespace Engine\Helper;

class Cookie{
    
    /**
    * Add cookies
    * @param $key
    * @param $value
    * @param int $time
    */
    public static function set($key, $value){
        
        session_start();
        $_SESSION[$key] = $value;
        
    }
    
    /**
    * Get cookies by key
    * @param $key
    * @return null
    */
    public static function get($key){
        
        if ( isset($_SESSION[$key]) ) {
            return $_SESSION[$key];
        }
        return null;
    }
    
    /**
    * Delete cookies by key
    * @param $key
    */
    public static function delete($key){
        
        $_SESSION[$key] = '';
        
        session_destroy();
    }
}
