
<?php

session_start();
include_once "dbhelper.php";

if(isset($_SESSION['user'])!="")
{
    //echo "damn!!";
    header("Location: home.php");	// change probably done
}

?>


<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Log in</title>
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
            <a class="navbar-brand" href="#">অনুভূতি</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php"><span class="glyphicon glyphicon-user"></span>Register</a></li>
        </ul>
    </div>
</nav>

</div>
<!----End-top-nav---->
<!----End-Header---->
<!--start-image-slider---->
<!----End-top-nav---->
<!----End-Header---->
<!--start-image-slider---->

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

            <form action="loginaction.php" method="post">
                <h2>Please login</h2>
                <br/>

                    Thank you for helping us
                    <hr class="colorgraph">

                    <div class="form-group">
                        <input type="email" name="mail" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                    </div>

                    <div class="form-group">
                        <input type="password" name="pass" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                    </div>


                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><input type="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                    </div>
            </form>
        </div>
    </div>
    <a href="adminlogin.php">Admin Login</a>
</div><!-- container ends-->


</body>
</html>



>