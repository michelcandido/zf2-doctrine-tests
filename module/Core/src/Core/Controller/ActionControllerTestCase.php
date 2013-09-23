<?php
namespace Core\Controller;

use Core\Test\ModelTestCase;
use Zend\Http\Request;
use Zend\Console\Response;
use Zend\Mvc\Router\Console\RouteMatch;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use User\Entity\User;
use User\Entity\Role;
use Permission\Entity\Permission;
/**
 * 
 * @author Michel Candido <michel@michelcandido.com.br>
 *
 */
class ActionControllerTestCase extends ModelTestCase
{
	
	
	
	protected $traceError = true;
	
	/**
	 *
	 * @var AbstractActionController
	 */
	protected $controller;
	/**
	 *
	 * @var Request
	 */
	protected $request;
	/**
	 *
	 * @var Response
	 */
	protected $response;
	/**
	 *
	 * @var RouteMatch
	 */
	protected $routeMatch;
	
	/**
	 *
	 * @var MvcEvent
	 */
	protected $event;
	
	protected $application;
	
	protected $controllerStringName = '';
	
	
	public function setUp(){
    	
		parent::setUp();
		
		$this->controller = new $this->controllerStringName();
        $this->request    = $this->controller->getRequest();//new Request();
        $this->response   = $this->controller->getResponse();//new Response();
        $this->routeMatch = new RouteMatch(array('controller' => 'index'));
        $this->event      = new MvcEvent();
        
        $config = $this->getService('Config');
        $routerConfig = isset($config['router']) ? $config['router'] : array();
        $router =  HttpRouter::factory($routerConfig);

       	
        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($this->serviceManager);
        
        
    }
    
    
    public function tearDown(){
    	parent::tearDown();
    	unset($this->controller);
    	unset($this->request);
    	unset($this->response);
    	unset($this->routeMatch);
    	unset($this->event);
    }
   
    
}