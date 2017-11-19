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
    public function execute($sql, $values){
        
        $sth = $this->link->prepare($sql);
        
        return $sth->execute($values);
    }
    
    /**
    * query
    *
    * @param string $sql
    * @return void
    */
    public function query($sql, $values = [], $statement = PDO::FETCH_OBJ)
    {
        $sth = $this->link->prepare($sql);
        // print_r($values);
        $sth->execute($values);

        $result = $sth->fetchAll($statement);

        if($result === false){
            return [];
        }

        return $result;
    }

    /**
     * @return int
     */
    public function lastInsertId()
    {
        return $this->link->lastInsertId();
    }
}