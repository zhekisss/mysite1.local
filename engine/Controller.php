<?php
namespace Engine;

use Engine\DI\DI,
    Engine\Core\Database\QueryBuilder;


abstract class Controller
{

    /**
     * @var Engine\DI\DI
     */
    protected $di;

    protected $db;

    protected $view;

    protected $config;

    protected $auth;

    protected $request;

    protected $ajax;

    protected $redirect;

    public function __construct(DI $di)
    {

        $this->di           = $di;
        $this->config       = $this->di->get('config');
        $this->view         = $this->di->get('view');
        $this->db           = $this->di->get('db');
        $this->auth         = $this->di->get('auth');
        $this->request      = $this->di->get('request');
        $this->ajax         = $this->di->get('ajax');
        $this->redirect     = $this->di->get('redirect');
    }
}
