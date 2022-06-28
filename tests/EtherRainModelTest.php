<?php
use Gardeneer\EtherRain\Model\EtherRain;
use Gardeneer\EtherRain\Model\EtherRainStatus;

use PHPUnit\Framework\TestCase;

class EtherRainModelTest extends TestCase
{
	public function testEtherrainModel()
	{
	    $url = 'http://localhost/';
	    $username = 'user';
	    $password = 'password';
	    $newUrl = 'http:/127.0.0.1';
	    $newUsername = 'newUser';
	    $newPassword = 'newPassword';
	    $etherrain = new EtherRain($url, $username, $password);
	    $this->assertEquals($url, $etherrain->getUrl(), 
	        'Testing url constructor assignment');
	    $this->assertEquals($username, $etherrain->getUsername(), 
	        'Testing user constructor assignment');
	    $this->assertEquals($password, $etherrain->getPassword(), 
	        'Testing password constructor assignment');
	    $this->assertEquals(
	        "[EtherRain] = URL: $url; Username: $username; Password: $password", 
	        $etherrain, 'Testing toString method');
	    $etherrain->setUrl($newUrl);
	    $etherrain->setUsername($newUsername);
	    $etherrain->setPassword($newPassword);
	    $this->assertEquals($newUrl, $etherrain->getUrl(), 
	        'Testing url set method assignment');
	    $this->assertEquals($newUsername, $etherrain->getUsername(), 
	        'Testing user set method assignment');
	    $this->assertEquals($newPassword, $etherrain->getPassword(), 
	        'Testing password set method assignment');
	}
	
	public function testEtherrainStatusModel()
	{
	    $uniqueName = 'uniqueName';
	    $macAddress = 'FFFFFFFFFFFF';
	    $accountNumber = '12345678';
	    $operatingStatus = 'WT';
	    $commandStatus = 'OK';
	    $operatingResult = 'OK';
	    $relayIndex = 1;
	    $rainIndicator = 0;
	    
	    $response = 
	       "un:$uniqueName\r\n" .
	       "ma:$macAddress\r\n" .
	       "ac:$accountNumber\r\n" .
	       "os:$operatingStatus\r\n" .
	       "cs:$commandStatus\r\n" .
	       "rz:$operatingResult\r\n" .
	       "ri:$relayIndex\r\n" .
	       "rn:$rainIndicator";
	    $status = new EtherRainStatus($response);
	    $this->assertEquals($uniqueName, $status->getUniqueName(), 
	        'Testing uniqueName constructor assignment');
	    $this->assertEquals($macAddress, $status->getMacAddress(), 
	        'Testing macAddress constructor assignment');
	    $this->assertEquals($accountNumber, $status->getAccountNumber(), 
	        'Testing accountNumber constructor assignment');
	    $this->assertEquals($operatingStatus, $status->getOperatingStatus(),
	        'Testing operatingStatus constructor assignment');
	    $this->assertEquals($commandStatus, $status->getCommandStatus(),
	        'Testing commandStatus constructor assignment');
	    $this->assertEquals($operatingResult, $status->getOperatingResult(),
	        'Testing operatingResult constructor assignment');
	    $this->assertEquals($relayIndex, $status->getRelayIndex(),
	        'Testing relayIndex constructor assignment');
	    $this->assertEquals($rainIndicator, $status->getRainIndicator(),
	        'Testing rainIndicator constructor assignment');
	    $this->assertEquals(
	        "[EtherRainStatus] = UniqueName: $uniqueName; MAC Address: $macAddress; " .
	        "Account Number: $accountNumber; Operating Status: $operatingStatus; " .
	        "Command Status: $commandStatus; Operating Result: $operatingResult; " .
	        "Relay Index: $relayIndex; Rain Indicator: $rainIndicator", $status,
	        'Testing EtherrainStatus toString method');
	    
        // Multivalue constructor assignment test
	    $status = new EtherRainStatus(
	        $uniqueName, $macAddress, $accountNumber, $operatingStatus,
	        $commandStatus, $operatingResult, $relayIndex, $rainIndicator);
	    $this->assertEquals($uniqueName, $status->getUniqueName(),
	        'Testing uniqueName constructor multivalue assignment');
	    $this->assertEquals($macAddress, $status->getMacAddress(),
	        'Testing macAddress constructor multivalue assignment');
	    $this->assertEquals($accountNumber, $status->getAccountNumber(),
	        'Testing accountNumber constructor multivalue assignment');
	    $this->assertEquals($operatingStatus, $status->getOperatingStatus(),
	        'Testing operatingStatus constructor multivalue assignment');
	    $this->assertEquals($commandStatus, $status->getCommandStatus(),
	        'Testing commandStatus constructor multivalue assignment');
	    $this->assertEquals($operatingResult, $status->getOperatingResult(),
	        'Testing operatingResult constructor multivalue assignment');
	    $this->assertEquals($relayIndex, $status->getRelayIndex(),
	        'Testing relayIndex constructor multivalue assignment');
	    $this->assertEquals($rainIndicator, $status->getRainIndicator(),
	        'Testing rainIndicator constructor multivalue assignment');
	}
}
