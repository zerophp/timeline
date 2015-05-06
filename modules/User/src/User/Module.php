<?php
namespace User;

class Module
{
    static $instance;
    public $options;    
    
    private function __construct()
    {
        
    }
    
    public static function getInstance()
    {
        if(isset(self::$instance))
        {
            return self::$instance;
        }
        else
        {
            self::$instance = new Module();
            return self::$instance;
        }
            
    }
    
}