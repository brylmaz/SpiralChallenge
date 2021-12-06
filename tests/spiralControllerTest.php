<?php 
namespace App\tests;



class spiralControllerTest extends \PHPUnit\Framework\TestCase{
	
	public function testgetValueOfLayout(){
		$url ="https://spiralchallenge.herokuapp.com/getValueOfLayout";
		$postData = json_encode(array(
			"X"=>0,
			"Y"=>3,
			"LastInsertId"=>6
		),true);
		
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL,$url); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
		curl_setopt($ch,CURLOPT_HEADER, false); 
		curl_setopt($ch, CURLOPT_POST, $postData);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); 
		$output=curl_exec($ch); 
		$output = json_decode($output,true);
		curl_close($ch);

		$this->assertEquals(15,$output['value']); 
		

	}
}





?>