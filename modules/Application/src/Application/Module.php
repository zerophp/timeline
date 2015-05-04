<?php
namespace Application;

class Module
{
    static $instance;
    public $options;
    
    private function __construct()
    {
        echo "ESTO ES LA INSTANCIA DE ".__NAMESPACE__;
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