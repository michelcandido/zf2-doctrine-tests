<?php
/**
 * Michel Candido (http://michelcandido.com.br/)
 * 
 * @license http://pt.wikipedia.org/wiki/Licença_BSD Licença BSD
 * @version GIT: <git_id>
 * @link    http://github.com/michelcandido/
 */

namespace Core\Controller;

use Zend\View\Model\ViewModel;

class CoreAbstractActionController extends \Zend\Mvc\Controller\AbstractActionController
{

    /**
     * Register per page
     */
    const COUNT_PER_PAGE = 10;
    /*Messages*/
    const MESSAGE_DELETE = 'Record deleted successfully!';
    const MESSAGE_INSERT = 'Record inserted successfully!';
    const MESSAGE_UPDATE = 'Record updated successfully!';
    const MESSAGE_ERROR  = 'Error!';
    const MESSAGE_RECORD_NOT_FOUND = 'Record not found!';
    /*Messages*/

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->getServiceLocator()->get('EntityManager');
    }

    /**
     * @param string $message
     * @param string $router
     * @param array $params
     * @return \Zend\Mvc\Controller\AbstractController::redirect()->toRouter()
     */
    public function redirect($message, $router, array $params = array())
    {
        if ($message) {
                $this->flashMessenger()->addMessage($message);
        }
        return parent::redirect()->toRoute($router, $params);
    }

    /**
     * 
     * @param string $entityName
     * @param int $id
     * @param string $router
     * @param array $params
     * @return \Zend\Http\Response|\Zend\Stdlib\ResponseInterface
     */
    protected function delete($entityName, $id, $router, $params = array())
    {
        $em = $this->getEntityManager();
        $entity = $em->getRepository($entityName)->find($id);
        if ($entity) {
            $entity->setAtivo(false);
            $em->persist($entity);
            $em->flush();
        } else {
            return $this->redirect(self::MESSAGE_RECORD_NOT_FOUND, $router, $params);
        }
        return $this->redirect(self::MESSAGE_DELETE, $router, $params);
    }

    /**
     *
     * @param array $params
     * @return \Zend\View\Model\ViewModel
     */
    public function viewModel(array $params)
    {
        $params['message'] = $this->flashMessenger()->getCurrentMessages();
        return new ViewModel($params);
    }
}
