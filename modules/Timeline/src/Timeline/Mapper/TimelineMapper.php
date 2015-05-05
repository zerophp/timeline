<?php
namespace Timeline\Mapper;

use acl\Core\Config;
use Timeline\Entity\Timeline;
use acl\Core\Entity\Hydrator;

class TimelineMapper
{
    private $resource = 'Timeline';
    public $adapter;
    
    public function getTimelines()
    {
        $gatewayName = "Timeline\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $timelines = $gateway->getTimelines();
        
        return $timelines;
    }
    
    public function getTimeline($id)
    {
        $gatewayName = "Timeline\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $timelines = $gateway->getTimeline($id);
        
        echo "aqui";
        $entity = new Timeline();
        echo "<pre>entity before: ";
        print_r($entity);
        echo "</pre>";
        
        
        $hydrator = new Hydrator();
        $entity = $hydrator->hydrate($timelines[0], $entity);
        
        echo "<pre>entity after: ";
        print_r($entity);
        echo "</pre>";
        
        $array2 = $hydrator->extract($entity);
        
        echo "<pre>entity extract: ";
        print_r($array2);
        echo "</pre>";
        
        return $timelines;
    }
    
    public function setTimeline($data)
    {
        $gatewayName = "Timeline\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $timelines = $gateway->setTimeline($data);
        
        return $timelines;
    }
    
    public function putTimeline($id, $data)
    {
        $gatewayName = "Timeline\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $timelines = $gateway->putTimeline($id, $data);
        
        return $timelines;
    }
    
    public function deleteTimeline($id)
    {
        $gatewayName = "Timeline\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $timelines = $gateway->deleteTimeline($id);
        
        return $timelines;
    }
    
    
    
}