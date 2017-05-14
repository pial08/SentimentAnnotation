<?php
	include_once "databasemanager.php";


	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$occupation = $_POST['occupation'];
	$semester = $_POST['semester'];
	$age = $_POST['age'];
	$place = $_POST['place'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	echo $occupation . "  " . $semester . " " . $age;

	
	//$db->boo();
	$db->signup($name,$mail,$occupation,$semester,$age,$place,$pass,$repass);
	header("Location: login.php");
	
	
	

	/*$myfile = fopen("signin.xml", "w")  or die("Unable to open file!");
	echo "boo!!";
	$xml = new SimpleXMLElement('<xml/>');
	$track = $xml->addChild('login_info');

	$track->addChild('email',"pqr");
	$track->addChild('password',"abc");
	//Header('Content-type: text/xml');
	fwrite($myfile, $xml->asXML());
	fclose($myfile);*/
	

	




?>
