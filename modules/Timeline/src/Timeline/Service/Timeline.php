<?php
namespace Timeline\Service;

use Timeline\Entity\Timeline as entityTimeline;
use acl\Core\Entity\Hydrator;
use Timeline\Mapper\TimelineMapper;
use Timeline\Mapper\Timeline\Mapper;
use Timeline\Entity\Timeline\Entity;

class Timeline
{
    
    public function getTimelines()
    {
        
    }
    public function getTimeline($id)
    {
        $timelinemapper = new TimelineMapper();
        $timelinemapper->setEntity(new entityTimeline());
        $timelinemapper->setHydrator(new Hydrator());
        $entity = $timelinemapper->getTimeline($id);
        
        return $entity;
    }
    public function setTimeline($data)
    {
    
    }
    public function putTimeline($id, $data)
    {
        
    }
    public function deleteTimeline($id)
    {
        
    }
    
}