<?php
namespace Core\Test;

use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
/**
 * 
 * @author Michel Candido <michel@michelcandido.com.br>
 *
 */
abstract class ControllerTestCase extends AbstractHttpControllerTestCase
{
	
	/**
	 *
	 * @var ServiceManagerConfig
	 */
	protected $serviceManager;
	
	public function setup()
	{
		$this->serviceManager = Bootstrap::getServiceManager();
		parent::setup();
		$this->createDatabase();
	
	}
	
	protected function tearDown()
	{
		parent::tearDown();
		$this->dropDatabase();
	}
	
	/**
	 * @return void
	 */
	public function createDatabase()
	{
		$em = $this->getEntityManager();
	
		$queries = include  Bootstrap::getModulePath().'/tests/data/test.data.php';
		sort($queries);
		foreach ($queries as $query) {
			$em->getConnection()->exec($query['create']);
		}
	}
	
	/**
	 * @return void
	 */
	public function dropDatabase()
	{
		$em = $this->getEntityManager();
		$queries = include  Bootstrap::getModulePath().'/tests/data/test.data.php';
		arsort($queries);
		foreach ($queries as $query) {
			$em->getConnection()->exec($query['drop']);
		}
	}
}