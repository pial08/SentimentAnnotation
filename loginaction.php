<?php
	session_start();
	include_once "databasemanager.php";
	
	if(isset($_SESSION['user'])!="")
	{
		echo "damn!!";
		header("Location: home.php");	// change probably done
	}
	

	
	//$radio = $_POST['person'];
	
	//echo $radio . " " . $radio; 
	
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	//echo $mail . "  " . $pass;
	//header("Location: home.php");
	//$db->begin();
	
		echo $mail . " in action  " . $pass;
		$flag = $db->signin($mail,$pass,'User');	//changed
		if($flag==1)
		{
			$_SESSION['user'] = $mail;
			$_SESSION['type'] = "user";
            $_SESSION['count'] = 0;
			$user = $db->getuserinfo($_SESSION['user']);
			if($user['initial'] == 0)
				header("Location: welcome.php");
			else
			{
				//$_SESSION['count'] = 0;
                header("Location: home.php");
            }
		}
		else
		{
			header("Location: loginFailed.php");
		}

	




?>
