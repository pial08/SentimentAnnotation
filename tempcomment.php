<?php
	include_once "databasemanager.php";
	session_start();
	
	if(!isset($_SESSION['user']))
	{
		header("Location: index.php");	//go back to previous directory
	}
	
	$type = $_SESSION['type'];
	if($type == "admin")
	{
		$user = $db->getuserinfo($_SESSION['user']);
	}
	else
	{
		$user = $db->getadmininfo($_SESSION['user']);
	}
	
	//$user = $db->getuserinfo($_SESSION['user']);
	echo $user['Name'];
	
	$comments = $db->get10comments($user["offset"],10);
	$comment = array();
	for($i=0;$i<10;$i++)
	{
		$comment[$i] = $comments[$i];
	}
	

	$annotation = array();

	for($i=0;$i<10;$i++)
	{
		echo $i;
		$annotation[$i] = $_POST['num' . $i];
		//echo 			 $_POST['num' . $i];
		echo $annotation[$i];
			  
	}
	
	
	
	$uid = $user["uid"];
	echo $uid;

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "AnnotateComment";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	mysqli_query($conn,'SET CHARACTER SET utf8'); 
	mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	

		for($i=0;$i<10;$i++)
		{
			$val = $comment[$i]['id'];
			$sql = "INSERT INTO AnnotatedComments (cid,uid,annotation)
					VALUES ($val,$uid,'$annotation[$i]')";	
			echo $sql;
			if (mysqli_query($conn, $sql)) {
			//echo "Signed Up successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}		
		}

		//update user info
		$offset = $user['offset'] + 10;
		if(($offset-1)%250 == 0)
		{
			//get new chunk
			$chunk = $this->getchunkinfo();
			$chunkid = $chunk["id"];
			$ccount = $chunk["numberofassigned"];
			//update user
			$sql = "UPDATE User SET chunkid='$chunkid' WHERE id='$uid'";
			mysqli_query($conn, $sql);
			$sql = "UPDATE User SET offset='$offset' WHERE id='$uid'";
			mysqli_query($conn, $sql);
			
		}
		//increase offset value by 10 in the database
		echo "\nincreasing offset\n" . $offset;

		$sql = "UPDATE User SET offset='$offset' WHERE uid='$uid'";
		if (mysqli_query($conn, $sql)) {
			//echo "Signed Up successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}		

	


	//echo $comment0["id"] . " ## " . $uid . " ** " . $comment0["comment"] . " pial " . $annotation0;
	
	mysqli_close($conn);

	
	

header("Location: home.php");


	




	




?>
