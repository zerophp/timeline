<?php
namespace User\Controller;

use acl\Core\View\View;
use User\Service\User;

class Auth
{
    public $layout ='dashboard';
    
    public function loginAction()
    {
       if($_POST)
       {
            $service = new User();
            $data = $service->loginUser($_POST);
            
            if($data)
            {
                header ("Location: /timeline");
                exit();    
            }
            header ("Location: /auth/login");
       }
       else
       {
           $content = View::renderView("../modules/User/views/auth/login.phtml");           
       }
       return $content;
    }
    
    public function logoutAction()
    {
        unset($_SESSION['user']);
        header ("Location: /auth/login");
        
    }
    
    public function registerAction()
    {
        
    }
    
    
}