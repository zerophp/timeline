<?php
namespace User\Controller;

use acl\Core\View\View;
use User\Mapper\UserMapper;
use acl\Core\Options\OptionsAwareInterface;

class Crud implements OptionsAwareInterface
{
    public $layout ='dashboard';
    protected $request;
    protected $options;
    
    public function __construct($request)
    {
        $this->request = $request;    
    }
    
    public function indexAction()
    {
//         header("Location: /timeline/select");    
        return $this->selectAction();
    }
    
    public function selectAction()
    {
        echo "esto es select";
       
        
        $mapper = new UserMapper();
        $users = $mapper->getUsers();
                
        $content = View::renderView("../modules/User/views/crud/select.phtml",
             array('users'=>$users)
        );
        return $content;
    }
    
    public function insertAction()
    {
        echo "esto es insert";
        if($_POST)
        {
            $mapper = new UserMapper();
            $timeline = $mapper->setUser($_POST);
            header("Location: /user/select");
        }
        else
        {
            $content = View::renderView("../modules/User/views/crud/insert.phtml");
        }
        return $content;
    }
    
    public function updateAction()
    {
        echo "esto es update";
        if ($_POST)
        {
            $mapper = new UserMapper();
            $timeline = $mapper->putUser($_POST['iduser'],$_POST);
            header("Location: /user/select");
        }
        else
        {
            $mapper = new UserMapper();
            $timeline = $mapper->getUser($this->request['params']['iduser']);
            
            $content = View::renderView("../modules/User/views/crud/update.phtml",
                array('fieldsLine'=>$timeline)
            );
        }
        return $content;
    }
    
    public function deleteAction()
    {
        echo "esto es delete";
        if ($_POST)
        {
            if ($_POST['borrar'] === "SI")
            {
                $mapper = new UserMapper();
                $timelines = $mapper->deleteUser($_POST['iduser']);                
            }
            header("Location: /user/select");
        }
        else
        {
            $mapper = new UserMapper();
            $timeline = $mapper->getUser($this->request['params']['iduser']);
      

            
            $content = View::renderView("../modules/User/views/crud/delete.phtml",
                array('timeline'=>$timeline)
            );
        }
        return $content;
    }
    
 /**
     * @return the $options
     */
    public function getOptions()
    {
        return $this->options;
    }

 /**
     * @param field_type $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    
   
}