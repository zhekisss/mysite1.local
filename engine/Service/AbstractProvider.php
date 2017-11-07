<?php

namespace Engine\Service;

/**
*
* 
* \Engine\DI\DI;
*/
abstract class AbstractProvider{
    
    protected $di;
    
    public function __construct(\Engine\DI\DI $di){
        $this->di = $di;
    }

    /**
     * Инициализация сервисов
     *
     * @return void
     */
    abstract public function init();
}