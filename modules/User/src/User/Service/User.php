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
    
    public function loginUser($filter)
    {
        $mapper = new UserMapper();
        $users = $mapper->getUserByEmailPassword($filter);
    
        echo "<pre>";
        print_r($users);
        echo "</pre>";
        
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