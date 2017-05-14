<?php
	include_once "databasemanager.php";
	session_start();
	
	if(!isset($_SESSION['user']))
	{
		header("Location: index.php");	//go back to previous directory
	}
	


?>



<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>	
		<title>Home</title>
		<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

				<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>

		<body style="background-color: #dae6ef">

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php"> অনুভূতি </a>

                </div>
                <ul class="nav navbar-nav navbar-left">

                    <li><a href="welcome.php"></span>Welcome</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user'] . "    "; ?></a></li>
                    <li><a href="logout.php" ><span class="glyphicon glyphicon-log-in"></span>Log Out</a></li>
                </ul>
            </div>
        </nav>
				
				<?php
				if($_SESSION['type'] == "user")
				{
					$user = $db->getuserinfo($_SESSION['user']);
					$uid = $user["uid"];
					$db-> updateinit($_SESSION['user']);
					$counter = 10;
					$comments = $db->get10comments($user["offset"],$counter);
					
					
					
					$comment = array();

					for($i=0;$i<$counter;$i++)
					{
						$comment[$i] = $comments[$i];
					}
				}
				else
				{
					$user = $db->getadmininfo($_SESSION['user']);			//create new function
					$ordinate = $user['ordinate'];
					$chunk = $user['chunk'];
					$counter = 15;
					$comments = $db->get10comments(100*($chunk-1)+1+15*$ordinate,$counter);
					
					$comment = array();

					for($i=0;$i<$counter;$i++)
					{
						$comment[$i] = $comments[$i];
					}
				}

				$_SESSION['counter'] = $counter;
			 ?>
            
            <h3 align="center" style="color:#635e57;">No. of comments done in this session:  <?php echo $_SESSION['count']; ?> </h3>
            <h4 align="center">Please finish comments as a multiple of <b style="color:red;">100</b>, for example 100,200,500 etc. </h4>

            <h4><b> বাক্যগুলোতে আপনার যে ধরনের অনুভূতি প্রকাশ পেয়েছে বলে মনে হয় সেই অপশন টি সিলেক্ট করুন । </b></h4>
			
			<div class="container-fluid">

			
			<form action="comment.php" method="post">
			<?php 
				//test part
				for($i=0;$i<$counter;$i++)
				{
			?>
				
				
					<div class="form-group">
					<?php echo $i+1 . " . " . $comment[$i]["comment"]; ?> <br>	
					<input class=".radio-inline" type="radio" name="num<?php echo $i; ?>" value="positive"> পজিটিভ
                        <input class=".radio-inline" type="radio" name="num<?php echo $i; ?>" value="negative">  নেগেটিভ
  				<input class=".radio-inline" type="radio" name="num<?php echo $i; ?>" value="neutral">   সাধারণ 
				<input class=".radio-inline" type="radio" name="num<?php echo $i; ?>" value="ambiguous"> ব্যাঙ্গ / বুঝা যাচ্ছে না
					<br><br/>
				</div>
					


				
			
			
			<?php
				}
			
			?>
				
			<input type="submit" class="btn btn-primary btn-md">
			</form>
				
			</div>
		
			

				
				
				
			 
		
			 
		</body>
</html>

