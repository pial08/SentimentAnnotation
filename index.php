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
    <title>Register</title>
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
            <a class="navbar-brand" href="index.php">অনুভূতি</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php"><span class="glyphicon glyphicon-user"></span>Log In</a></li>
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

            <form action="registration.php" method="post">
                <h2>Please <a href="login.php">Login</a> if you have already registered <br/>
                <hr class="colorgraph">

                <div class="form-group">
                    <input type="text" name="name" class="form-control input-lg" placeholder="Full Name" tabindex="1">
                </div>

                <div class="form-group">
                    <input type="email" name="mail" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                </div>

                <!--                    <div class="form-group">-->
                <!---->
                <!--                      <h3>-->
                <!--                          Your Occupation?-->
                <!--                      </h3>-->
                <!---->
                <!--                      <select name="occupation" class="form-control input-lg" >-->
                <!--                        <option value="Student">Student</option>-->
                <!--                        <option value="Job Holder">Job Holder</option>-->
                <!--                      </select>-->
                <!--                    </div>-->

                <div class="form-group">
                    <input type="text" name="semester" id="semester" class="form-control input-lg" placeholder="Your Semester,e.g:7" tabindex="4">
                </div>

                <div class="form-group">
                    <input type="text" name="age" id="age" class="form-control input-lg" placeholder="Input your age in years,e.g:21" tabindex="4">
                </div>

                <div class="form-group">
                    <input type="text" name="place" id="age" class="form-control input-lg" placeholder="Short University Name,e.g:DU,IUB" tabindex="4">
                </div>



                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="pass" id="password" class="form-control input-lg" placeholder="Simple Password" tabindex="5">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="repass" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                        </div>

                    </div>
                </div>

                <!--
              <div class="row">
                <div class="col-xs-4 col-sm-3 col-md-3">
                  <span class="button-checkbox">
                    <button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
                                <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
                  </span>
                </div>

              </div>
              -->

                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                </div>
            </form>
        </div>
    </div>

</div><!-- container ends-->


</body>
</html
