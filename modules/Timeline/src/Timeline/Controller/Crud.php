<?php
namespace Timeline\Controller;

use acl\Core\View\View;
use Timeline\Mapper\TimelineMapper;
use acl\Core\Options\OptionsAwareInterface;

class Crud implements OptionsAwareInterface
{
    public $layout ='dashboard';
    protected $request;
    protected $options;
    
    public function __construct($request)
    {
        if(!isset($_SESSION['user']))
            header ("Location: /auth/login");
        
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
        
        echo $this->getOptions()->getOption3();
        
        $mapper = new TimelineMapper();
        $timelines = $mapper->getTimelines();
        
//         echo "<pre>";
//         print_r($timelines);
//         echo "</pre>";
        
        
//         echo "<pre>";
//         print_r(json_encode($timelines));
//         echo "</pre>";
        
        
//         die;
                
        $content = View::renderView("../modules/Timeline/views/crud/select.phtml",
             array('timelines'=>$timelines)
        );
        return $content;
    }
    
    public function insertAction()
    {
        echo "esto es insert";
        if($_POST)
        {
            $mapper = new TimelineMapper();
            $timeline = $mapper->setTimeline($_POST);
            header("Location: /timeline/select");
        }
        else
        {
            $content = View::renderView("../modules/Timeline/views/crud/insert.phtml");
        }
        return $content;
    }
    
    public function updateAction()
    {
        echo "esto es update";
        if ($_POST)
        {
            $mapper = new TimelineMapper();
            $timeline = $mapper->putTimeline($_POST['idtimeline'],$_POST);
            header("Location: /timeline/select");
        }
        else
        {
            $mapper = new TimelineMapper();
            $timeline = $mapper->getTimeline($this->request['params']['idtimeline']);
            
            $content = View::renderView("../modules/Timeline/views/crud/update.phtml",
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
                $mapper = new TimelineMapper();
                $timelines = $mapper->deleteTimeline($_POST['idtimeline']);                
            }
            header("Location: /timeline/select");
        }
        else
        {
            $mapper = new TimelineMapper();
            $timeline = $mapper->getTimeline($this->request['params']['idtimeline']);
      

            echo "<pre>";
            print_r($timeline);
            echo "</pre>";
            
            
            die;
            
            
            $content = View::renderView("../modules/Timeline/views/crud/delete.phtml",
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