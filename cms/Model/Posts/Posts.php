<?php

namespace Cms\Model\Posts;

use Cms\Model\Model;
use Engine\Core\Database\Connection;

class Posts extends Model{
    

    public static function sql(){
        
        return 'SELECT * FROM `post`';

    }

    public function FunctionName(Type $var = null){
        
     return 'SELECT FROM nowa ORDER BY date DESC LIMIT 7';
 
    }
}