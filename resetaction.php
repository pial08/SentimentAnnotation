<?php
	session_start();
	include_once "dbhelper.php";

	 echo $_SESSION['email'] . " " . $_POST['pass'] . " " . $POST['repass']; 
	

	
	
	$db->resetpass($_SESSION['email'],$_POST['pass']);
	

	




?>
