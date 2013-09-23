<?php
namespace Core\Entity;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilter;
/**
 * 
 * @author Michel Candido <michel@michelcandido.com.br>
 *
 */
abstract class Entity implements  InputFilterAwareInterface{
	 
	
	/**
	 * 
	 * @var InputFilter
	 */
	protected $inputFilter;
	
	
	/**
     *
     * @return multitype:
     */
    public function getArrayCopy(){
    	return get_object_vars($this);
    }
    
    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate(array $data = array()){
    	foreach ($data as $property => $value) {
    		if (! property_exists($this, $property)) {
    			continue;
    		}
    		$method = 'set'.ucfirst($property);
    		$this->$method($value);
    	}
    }
    
    /**
     * Set input filter
     *
     * @param  InputFilterInterface $inputFilter
     * @return InputFilterAwareInterface
     */
    public function setInputFilter(InputFilterInterface $inputFilter){
    	throw new \Exception("Not used");
    }
    
    public function getInputFilter(){
    	throw new \Exception("Method not implemented!");
    }
    
}
