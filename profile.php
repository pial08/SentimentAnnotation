<?php
	session_start();
	include_once "databasemanager.php";

	
	
	if(!isset($_SESSION['user']))
	{
		header("Location: index.php");	//go back to previous directory
	}
    $user = $db->getuserinfo($_SESSION['user']);
	$sum = $user['sum'];


  
?>

<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>	
		<title>Profile</title>
		<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

				<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>

		<body>
			
			<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Annotate Bangla</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="home.php"><span class="glyphicon glyphicon-user"></span>Home</a></li>
					<li><a href="logout.php" ><span class="glyphicon glyphicon-log-in"></span>Log Out</a></li>
				</ul>
			</div>
			</nav>

<div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $user["Name"] ;  ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Email :</td>
                        <td> <?php echo $user["email"]; ?></td>
                      </tr>
                      <tr>
                        <td>No. of comments done</td>
                        <td><?php echo  $sum ; ?></td>
                      </tr>
                      <tr>
                        <td>Occupation</td>
                        <td> <?php echo $user["occupation"]; ?></td>
                      </tr>
											<tr>
                        <td>Semester</td>
                        <td><?php echo $user["semester"]; ?></td>
                      </tr>
											<tr>
                        <td>Age</td>
                        <td><?php echo $user["age"]; ?></td>
                      </tr>
                   

                           
                      </tr>
                     
                    </tbody>
                  </table>
                  

                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
		</body>
	
</html>