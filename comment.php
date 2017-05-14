<?php
	include_once "databasemanager.php";
	session_start();
	
	if(!isset($_SESSION['user']))
	{
		header("Location: index.php");	//go back to previous directory
	}

	$type = $_SESSION['type'];
	$counter = $_SESSION['counter'];
	if($type == "admin")
	{
		$user = $db->getadmininfo($_SESSION['user']);
		$chunk = $user['chunk'];
		$comments = $db->get10comments(100*($chunk-1)+1+15*$ordinate,$counter);

        $_SESSION['count'] = $_SESSION['count'] + 15;
	}
	else
	{
		$user = $db->getuserinfo($_SESSION['user']);
		$comments = $db->get10comments($user["offset"],$counter);

        $_SESSION['count'] = $_SESSION['count'] + 10;

	}
	$db->sumcalculate();
	
	//$user = $db->getuserinfo($_SESSION['user']);
	echo $user['Name'];
	//$counter = $_SESSION['counter'];
	
	//$comments = $db->get10comments($user["offset"],$counter);
	$comment = array();
	for($i=0;$i<$counter;$i++)
	{
		echo $i . "\n";
		$comment[$i] = $comments[$i];
	}
	

	$annotation = array();

	for($i=0;$i<$counter;$i++)
	{
		echo $i;
		//if (empty($_POST['num' . $i])) {
		//	$genderErr = "Value is required";

		$annotation[$i] = $_POST['num' . $i];
		//echo 			 $_POST['num' . $i];
		//next 51-53 are the lines that changes were made
		if(!strcmp($annotation,"positive") || !strcmp($annotation,"negative") || !strcmp($annotation,"neutral") || !strcmp($annotation,"ambiguous") )
		{
            header("Location: home.php");
		}
		echo $annotation[$i];
			  
	}
	
	
	
	$uid = $user["uid"];
	echo $uid;
	echo $counter . "***************************";

	$servername = "10.130.24.163";
	$username = "root";
	$password = "ncfv0CG89J";
	$dbname = "AnnotateComment";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	mysqli_query($conn,'SET CHARACTER SET utf8'); 
	mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	

		for($i=0;$i<$counter;$i++)
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
		if($type == "user")
		{
			$offset = $user['offset'] + 10;
			if(($offset-1)%100 == 0)
			{
				//get new chunk
				$chunk = $db->getchunkinfo();
				$chunkid = $chunk["id"] ;
				$ccount = $chunk["numberofassigned"];

                $offset = ($chunkid-1) * 100 + 1;

				//update user
				$sql = "UPDATE User SET chunk='$chunkid' WHERE uid='$uid'";
				mysqli_query($conn, $sql);
				$sql = "UPDATE User SET offset='$offset' WHERE uid='$uid'";
				mysqli_query($conn, $sql);

			}
			//increase offset value by 10 in the database
			else {
                echo "\nincreasing offset\n" . $offset;

                $sql = "UPDATE User SET offset='$offset' WHERE uid='$uid'";
                if (mysqli_query($conn, $sql)) {
                    //echo "Signed Up successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }

	}
	else
	{
		//update admin
		$chunk = $user['chunk'] + 1;
		$sql = "UPDATE Admin SET chunk='$chunk' WHERE uid='$uid'";
				mysqli_query($conn, $sql);
	}


	//echo $comment0["id"] . " ## " . $uid . " ** " . $comment0["comment"] . " pial " . $annotation0;
	
	mysqli_close($conn);

	
	

header("Location: home.php");


	




	




?>
