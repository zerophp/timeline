<?php
namespace User\Mapper;

use acl\Core\Config;
use User\Entity\User;
use acl\Core\Entity\Hydrator;

class UserMapper
{
    private $resource = 'User';
    public $adapter;
    
    public function getUsers()
    {
        $gatewayName = $this->resource."\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $collection = $gateway->getUsers();
        
        return $collection;
    }
    
    public function getUserByEmailPassword($filter)
    {
        $gatewayName = $this->resource."\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $users = $gateway->getUserByEmailPassword(array('email'=>$filter['email'], 
                                                        'password'=>$filter['password']));
        
//         $entity = new User();
//         $hydrator = new Hydrator();
//         $entity = $hydrator->hydrate($users[0], $entity);
//         $array2 = $hydrator->extract($entity);
        return $users;
    }
    
    public function getUser($id)
    {
        $gatewayName = $this->resource."\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $users = $gateway->getUser($id);
        
//         echo "aqui";
        $entity = new User();
//         echo "<pre>entity before: ";
//         print_r($entity);
//         echo "</pre>";
        
        
        $hydrator = new Hydrator();
        $entity = $hydrator->hydrate($users[0], $entity);
        
//         echo "<pre>entity after: ";
//         print_r($entity);
//         echo "</pre>";
        
        $array2 = $hydrator->extract($entity);
        
//         echo "<pre>entity extract: ";
//         print_r($array2);
//         echo "</pre>";
        
        return $users;
    }
    
    public function setUser($data)
    {
        $gatewayName = $this->resource."\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $collection = $gateway->setUser($data);
        
        return $collection;
    }
    
    public function putUser($id, $data)
    {
        $gatewayName = $this->resource."\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $collection = $gateway->putUser($id, $data);
        
        return $collection;
    }
    
    public function deleteUser($id)
    {
        $gatewayName = $this->resource."\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $collection = $gateway->deleteUser($id);
        
        return $collection;
    }
    
    
    
}