<?php
namespace Core\Test;

use Zend\Db\Adapter\Adapter;
use Core\Db\TableGateway;
use Zend\Mvc\Application;
use Zend\Di\Di;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\Mvc\MvcEvent;
use Symfony\Component\Console\Tests\ApplicationTest;
use Application\Bootstrap;
/**
 * 
 * @author Michel Candido <michel@michelcandido.com.br>
 *
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{
   /**
    * 
    * @var ServiceManagerConfig
    */
	protected $serviceManager;
	
	public function __construct(){
		parent::__construct();
		$this->serviceManager =  clone Bootstrap::getServiceManager();
	}
    public function setup(){    	
        parent::setup();
        $this->createDatabase();
    }

    protected function tearDown(){
        parent::tearDown();
        $this->dropDatabase();
        $this->getEntityManager()->clear();
    }

    
    /**
     * Retrieve Service
     *
     * @param  string $service
     * @return Service
     */
    protected function getService($service)
    {
    	$sm =  $this->serviceManager->get($service);
        return $sm;
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

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager() 
    {
        return $this->serviceManager->get('EntityManager');
    }
}