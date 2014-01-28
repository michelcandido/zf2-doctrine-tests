<?php
/**
 * Michel Candido (http://michelcandido.com.br/)
 * 
 * @license http://pt.wikipedia.org/wiki/Licença_BSD Licença BSD
 * @version GIT: <git_id>
 * @link    http://github.com/michelcandido/
 */

namespace Core\Controller;

use Core\Test\TestCase;
use Zend\Http\Request;
use Zend\Console\Response;
use Zend\Mvc\Router\Console\RouteMatch;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;

class CoreControllerTestCase extends TestCase
{
    
    /**
     *
     * @var boolean 
     */
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

    /**
     *
     * @var String 
     */
    protected $controllerStringName = '';

    
    public function setUp()
    {
        parent::setUp();

        $this->controller = new $this->controllerStringName();
        $this->request    = $this->controller->getRequest();
        $this->response   = $this->controller->getResponse();
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

    public function tearDown()
    {
        parent::tearDown();
        unset($this->controller);
        unset($this->request);
        unset($this->response);
        unset($this->routeMatch);
        unset($this->event);
    }
}
