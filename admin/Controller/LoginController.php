<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;
use Engine\Core\Database\QueryBuilder;

class LoginController extends Controller
{
    
    /**
    * @var Auth
        */
    protected $auth;
    
    
    /**
    * LoginController constructor.
        * @param DI $di
        */
    public function __construct(DI $di)
    {
        parent::__construct($di);
        
        $this->auth = new Auth();
        
        if ($this->auth->hashUser() === true) {
            header( 'Location: /admin/');
            
            exit;
        }
    }
    
    public function form()
    {
        $this->view->render('login');
    }
    
    public function authAdmin()
    {
        $params       = $this->request->post;
        $queryBuilder = new QueryBuilder();
        
        $sql = $queryBuilder
                ->select()
                ->from('user')
                ->where('email', $params['email'])
                ->limit(1)
                ->sql();
        
        $query = $this->db->query($sql, $queryBuilder->values);

        $emailPass = $params['email'].$params['password'];
        $queryEmailPass = $query[0]['password'];

        if (!empty($query)) {
            $user = $query[0];
            
            if ($user['role'] == 'administrator') {
                
                if ($this->auth->encryptPassword($emailPass, $queryEmailPass)) {
                    $hash = password_hash($params['email'].$params['password'], 1);
                    
                    $sql = $queryBuilder
                    ->update('user')
                    ->set(['password' => $hash])
                    ->where('id', $user['id'])
                    ->sql();
                    
                    $this->db->execute($sql, $queryBuilder->values);
                    
                    $this->auth->authorize($user);
                    header("Location: /admin/login/");
                    exit;
                } else {
                }
            }
        }
        echo 'Incorrect email or password.';
        exit;
    }
}
