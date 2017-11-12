<?php

namespace Engine\Core\Database;

use Engine\Core\Config\Config;
use Engine\DI\DI;
use PDO;

class Connection {
    
    /**
    *
    * @var string
    */
    private $link;
    
    public function __construct(){
        
        $this->connect();
    }
    
    /**
    * Возвращает объект класса PDO
    *
    * @return $this
    */
    private function connect(){
        
        $config = Config::file('database');
        
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset='.$config['charset'];
        
        $this->link = new PDO($dsn, $config['username'], $config['password']);
        
        return $this;
        
    }
    
    /**
    * Execute query
    *
    * @param string $sql
    * @return void
    */
    public function execute($sql){
        
        $sth = $this->link->prepare($sql);
        
        return $sth->execute();
    }
    
    /**
    * query
    *
    * @param string $sql
    * @return void
    */
    public function query($sql){
        $sql1 = $sql;
        $sth = $this->link->prepare($sql);
        
        $sth->execute();
        
        if (!$result = $sth->fetchAll(PDO::FETCH_ASSOC)){
            return [];
        }
        return $result;
    }
}