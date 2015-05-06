<?php

// use User\Mapper\UserMapper;
// $mapper = new UserMapper();


// $cities = $mapper->getUsers;
// $genders = $mapper->getUsers();

return array(
    
    'email'=>array(
        'label' => 'Email',
        'type'=>'text',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,'required'=>true
        )
    ),
    'password'=>array(
        'label' => 'Password',
        'type'=>'password',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,'required'=>true
        )
    ),
    
    
    'submit'=>array(
        'label'=>'Enviar',
        'type'=>'submit'
    ),
);