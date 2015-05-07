<?php
namespace User\Service;

use User\Entity\User as entityUser;
use acl\Core\Entity\Hydrator;
use User\Mapper\UserMapper;
use User\Mapper\User\Mapper;
use User\Entity\User\Entity;

class User
{
    
    public function getUsers()
    {
        
    }
    
    protected function isValidToken($token)
    {
        $seed = "ksskjdclksdjd098127eklqmskcnx01927euqasdh0192";
        $sesid = session_id();        
        $val = $seed ^ $sesid;
        $mytoken = md5($val);
        
        if($token === $mytoken)
            return true;
        else
            return false;
    }
    
    public function loginUser($filter)
    {

        if(!$this->isValidToken($filter['csrf']))
        {
            header("Location: http://timeline.local/auth/login");
            exit();
        }
        
        $mapper = new UserMapper();
        $users = $mapper->getUserByEmailPassword($filter);
    
//         echo "<pre>";
//         print_r($users);
//         echo "</pre>";
        
        if(count($users)==1)
        {
            $_SESSION['user']=$filter['email'];
            return true;
        }
            
        return false;
        
    }
    
    
    public function getUser($id)
    {
        $mapper = new UserMapper();
        $mapper->setEntity(new entityUser());
        $mapper->setHydrator(new Hydrator());
        $entity = $mapper->getUser($id);
        
        return $entity;
    }
    public function setTimeline($data)
    {
    
    }
    public function putUser($id, $data)
    {
        
    }
    public function deleteUser($id)
    {
        
    }
    
}