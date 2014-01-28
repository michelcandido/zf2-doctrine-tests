<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'EntityManager' => function($sm){
                return $sm->get('\Doctrine\ORM\EntityManager');
            },
        ),
    ),
);
