<?php
/**
 * Michel Candido (http://michelcandido.com.br/)
 * 
 * @license http://pt.wikipedia.org/wiki/Licença_BSD Licença BSD
 * @version GIT: <git_id>
 * @link    http://github.com/michelcandido/
 */

namespace Core\Entity;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilter;

abstract class CoreEntity implements InputFilterAwareInterface
{
    /**
     * 
     * @var InputFilter
     */
    protected $inputFilter;

    /**
     *
     * @return multitype:
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate(array $data = array())
    {
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
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    
    /**
     * 
     * @throws \Exception
     */
    public function getInputFilter()
    {
        throw new \Exception("Method not implemented!");
    }
}
