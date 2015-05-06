<?php

// use User\Mapper\UserMapper;
// $mapper = new UserMapper();


// $cities = $mapper->getUsers;
// $genders = $mapper->getUsers();

return array(
    'iduser'=>array(
        'type'=>'hidden',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('required'=>true)
    ),
    'birthdate'=>array(
        'label' => 'Birthdate',
        'type' => 'date',
        'validators' => array ('date'=>true,'required'=>true)
    ),
    
    'name'=>array(
        'label' => 'Name',
        'type'=>'text',        
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,'required'=>true
        )
    ),
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
    'photo'=>array(
        'label' => 'Photo',
        'type'=>'text',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,'required'=>true
        )
    ),
    'description'=>array(
        'label' => 'Description',
        'type'=>'text',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,'required'=>true
        )
    ),
//     'city_idcity'=>array(
//         'label'=>'City',
//         'type'=>'checkbox',
//         'options'=> readFields($cities),
//         'validators'=>array('inArray'=>true)
//     ),
//     'gender_idgender'=>array(
//         'label'=>'Gender',
//         'type'=>'checkbox',
//         'options'=> readFields($genders),
//         'validators'=>array('inArray'=>true)
//     ),
    
    'submit'=>array(
        'label'=>'Enviar',
        'type'=>'submit'
    ),
);