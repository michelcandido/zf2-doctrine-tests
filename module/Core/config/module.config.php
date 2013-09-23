<?php
/**
 * @author Michel Candido <michel@michelcandido.com.br>
 */
return array(
	'service_manager' => array(
				'factories' => array(
						'EntityManager' => function($sm){
							return $sm->get('\Doctrine\ORM\EntityManager');
						},
				),
	),
);
