<?php
namespace Application\Controller;

use acl\Core\View\View;

class Error
{
    public $layout = 'error';
    
    public function __construct($request)
    {

    
        $this->request = $request;
    }
    
    public function indexAction()
    {
        return $this->e404Action();    
    }
    
    public function e400Action()
    {
        header("Status: 400");
        $content = View::renderView("../modules/Application/views/error/e400.phtml",
             array('request'=>$this->request)
        );
        return $content;
    }
    
    public function e404Action()
    {
        header("Status: 404");
        $content = View::renderView("../modules/Application/views/error/e404.phtml",
             array('request'=>$this->request)
        );
        return $content;
    }
    
    public function e500Action()
    {
        header("Status: 500");
        $content = View::renderView("../modules/Application/views/error/e500.phtml",
             array('request'=>$this->request)
        );
        return $content;
    }
    
}