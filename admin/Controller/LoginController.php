<?php

namespace Admin\Controller;

use Engine\DI\DI;
use Engine\Controller;
use Engine\Helper\Cookie;
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
        $this->auth->unAuthorize();
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
        
        $emailPass = isset($params['email']) ? $params['email'].$params['password'] : false ;
        $queryEmailPass = isset($query[0]->password) ? $query[0]->password : false;

        if (!empty($query)) {
            $user = $query[0];
            
            if ($user->role === 'administrator') {
                
                if ($this->auth->encryptPassword($emailPass, $queryEmailPass)) {
                    // $hash = $this->auth->passwordHash($params['email'].$params['password'], 1);
                    // 
                    // $sql = $queryBuilder
                    // ->update('user')
                    // ->set(['password' => $hash])
                    // ->where('id', $user['id'])
                    // ->sql();
                    // 
                    // $this->db->execute($sql, $queryBuilder->values);
                    $load = $this->load;
                    $this->auth->authorize($user);
                    Cookie::set('badPassword','');
                    header("Location: /admin/login/");
                    exit;
                } else {
                    Cookie::set('badPassword','Incorrect email or password.');
                    $this->redirect->redirect('/admin/login/');
                    exit;
                }
            }
        }

        Cookie::set('badPassword','Incorrect email or password.');
        $this->redirect->redirect('/admin/login/');
        exit;
    }
}
