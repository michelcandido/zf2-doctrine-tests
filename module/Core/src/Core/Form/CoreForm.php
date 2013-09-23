<?php
namespace Core\Form;
use Zend\Form\Form;
/**
 * 
 * @author Michel Candido <michel@michelcandido.com.br>
 *
 */
abstract class CoreForm extends Form{
	
	/**
	 * 
	 * @param Entity $entity
	 */
	public function populate($entity){
		if(is_object($entity)){
			
			foreach($this->getElements() as $elements=>$values){
				
				$method_name = "get".ucwords($elements);
				
				if(method_exists($entity, $method_name)){
					
					$this->get($elements)->setValue($entity->$method_name());
					
				}
				
			}
			
		}
		
	}

}
