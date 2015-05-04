<?php
namespace Application\Options;

class ModuleOptions
{
    protected $option1 = "valoption1";
    
    protected $option2 = "valoption2";
    
    protected $option3 = "valoption3";
    
 /**
     * @return the $option1
     */
    public function getOption1()
    {
        return $this->option1;
    }

 /**
     * @return the $option2
     */
    public function getOption2()
    {
        return $this->option2;
    }

 /**
     * @return the $option3
     */
    public function getOption3()
    {
        return $this->option3;
    }

 /**
     * @param string $option1
     */
    public function setOption1($option1)
    {
        $this->option1 = $option1;
    }

 /**
     * @param string $option2
     */
    public function setOption2($option2)
    {
        $this->option2 = $option2;
    }

 /**
     * @param string $option3
     */
    public function setOption3($option3)
    {
        $this->option3 = $option3;
    }


    
    
}