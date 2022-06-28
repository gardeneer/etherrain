<?php
use Gardeneer\EtherRain\Model\EtherRain;
use Gardeneer\EtherRain\Model\EtherRainStatus;
use Gardeneer\EtherRain\Controller\EtherRainController;

use PHPUnit\Framework\TestCase;

class EtherRainControllerTest extends TestCase
{
	public function testEtherrainController()
	{
	    $url = 'http://localhost/';
	    $username = 'user';
	    $password = 'password';
	    $etherrain = new EtherRain($url, $username, $password);
	    $controller = new EtherRainController($etherrain);
	    $login = $controller->login();
	    $this->assertFalse($login, 
	       'Testing login action');
	    $status = $controller->status();
	    
	    if ($login) {
	       $this->assertNotNull($status, 
	           'Testing status result IS NOT NULL');
	    } else {
	       $this->assertNull($status, 
	           'Testing status result IS NULL');
	    }
	}
}
