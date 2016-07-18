<?php

function doUserAuth($email,$password)
{
       $client = new SoapClient("http://in2lsync.com/services/ContentManager.asmx?WSDL");
       $strResult = $client->AuthenticateUser(array('apikey' => 'd7aidfkdjGADF@F','emailaddress' => $email, 'password' => $password))->AuthenticateUserResult;
       //echo $strResult;
	   $xmlResult = simplexml_load_string($strResult);
	   
	   if ($strResult == "<valid>false</valid>"){
	   		echo "Email and password not recognized.";
	   }
	   else {
	   		$name = $xmlResult->firstname . " " . $xmlResult->lastname;
			echo "Login Successful, Welcome " . $name;
	   }
}

if (isset($_POST['email'])){
    $email = $_POST['email'];
}
if (isset($_POST['password'])){
    $password = $_POST['password'];
}

if (!empty($email)&&!empty($password)){
	doUserAuth($email,$password);
}
?>