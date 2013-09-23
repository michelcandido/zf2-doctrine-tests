<?php
return array(
    'modules' => array(
    	'DoctrineModule',
    	'DoctrineORMModule',
    	'Application',
    	'Core',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            '../../../config/autoload/{,*.}{global,local.test}.php',
        ),
        'module_paths' => array(
            'module',
            'vendor',
        ),
    ),
);