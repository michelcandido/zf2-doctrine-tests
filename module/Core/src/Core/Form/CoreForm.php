<?php
/**
 * Michel Candido (http://michelcandido.com.br/)
 * 
 * @license http://pt.wikipedia.org/wiki/Licença_BSD Licença BSD
 * @version GIT: <git_id>
 * @link    http://github.com/michelcandido/
 */

namespace Core\Form;

use Zend\Form\Form;

abstract class CoreForm extends Form
{
    /**
    * 
    * @param Entity $entity
    */
    public function populate($entity)
    {
        if (is_object($entity)) {
            foreach ($this->getElements() as $elements => $values) {
                $method_name = "get".ucwords($elements);
                if (method_exists($entity, $method_name)) {
                    $this->get($elements)->setValue($entity->$method_name());
                }
            }
        }
    }
}
