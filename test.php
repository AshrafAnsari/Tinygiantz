<?php
 
class testClass
{
    private $testVariable = "This is the string in the private test variable.";
	
	public function returnTestString(){
		return $this->testVariable;
	}
}
 
$myClass = new testClass;

echo $myClass->returnTestString();
 
?>