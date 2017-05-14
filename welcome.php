<?php
  session_start();
	
//	if(!isset($_SESSION['user']))
//	{
//		header("Location: index.php");	//go back to previous directory
//	}
//

  
?>






<!DOCTYPE html>

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

                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                <li><a href="logout.php" ><span class="glyphicon glyphicon-log-in"></span>Log Out</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
            <div class="row">
                <h1 align="center">
                     আমাদের কে সাহায্য করার জন্য অনেক ধন্যবাদ।

                   </h1>
                <h3>
                          এই ওয়েবসাইট এ অংশগ্রহণ এর মাধ্যমে আপনি বাংলা তে একটি শক্তিশালী অনুভূতি এনালাইজার বানাতে সাহায্য করছেন।
               আপনার সাহায্য করা ডাটা দিয়ে ভবিষ্যতে বাংলা ভাষার উপর অনেক ধরণের কম্পিউটার সফটওয়্যার বানান সম্ভব হবে যা এতদিন শুধু ইংলিশেই করা যেত।

                </h3>

                    <h4>
                        ওয়েবসাইট টি তে গেলে আপনি চার ধরণের বাক্য দেখতে পাবেন।

                        <ul>
                           <li>পজিটিভ </li>
                           <li>নেগেটিভ</li>
                           <li>সাধারণ </li>
                           <li>ব্যাঙ্গ / বুঝা যাচ্ছে না </li>

                        </ul>
                        নিচে কোন বাক্য কোন ধরণের হবে তার কয়েকটি উদাহরণ দেয়া হল :

                    </h4>
				


            </div>
            <div class="row">
                <h4>
                <dl class="dl-horizontal">

                    <dt>পজিটিভ </dt>
                    <dd>দেশকে যাঁরা দেন, তাঁরা কোনো কিছু ফেরত পাওয়ার আশায় দেন না </dd>
                    <dt>পজিটিভ </dt>
                    <dd>চমৎকার হয়ছে </dd>
                    <dt>পজিটিভ </dt>
                    <dd>আহা কি আনন্দ আঁকাশে বাতাসে </dd>
                    <br/>

                    <dt>নেগেটিভ</dt>
                    <dd>ওরা কি মানুষ ?</dd>
                    <dt>নেগেটিভ</dt>
                    <dd>মোনাফেকদের প্রধান লক্ষন হচ্ছে কথা দিয়ে কথা না রাখ </dd>
                    <br/>

                    <dt>সাধারণ</dt>
                    <dd>একদম ছোটবেলা থেকেই দেখে আসছি</dd>
                    <dt>সাধারণ</dt>
                    <dd>ইস বাপ-ছেলের লড়ায় দেখতে পারলাম না</dd>
                    <dt>সাধারণ</dt>
                    <dd>নেইমারসহ গোটা ব্রাজিলের প্রতি আমার সমবেদনা রইল</dd>
                    <dt>সাধারণ</dt>
                    <dd>একমত</dd>
                    <br/>

                    <dt>ব্যাঙ্গ</dt>
                    <dd>ভাল না ভালইইতো!!!! সভ্য বাংলাদেশ  </dd>
                    <dt>বুঝা যাচ্ছে না</dt>
                    <dd>মুশফিকের এত্ত আবেগ ক্যারে? আবেগে ম্যাচ হাইরালাইছে </dd>
                    <br/>

                </dl>
                </h4>
                <h4>
                     এখানে লক্ষণীয় যে বাক্য গুলতে অনেক বানান ভুল থাকতে পারে । সেক্ষেত্রে যদি বুঝা যায় যে আসল বাক্য কি ছিল তাহলে সেই বাক্য ধরে  ওই ক্যাটাগরি তে ফেলতে হবে। <br/>
                      নিচের বাটন এ ক্লিক করে আপনি এখন ওয়েবসাইট এ যেতে পারেন । উপরে সবার  বামে 'Welcome'  ট্যাব টি তে ক্লিক করে আপনি এই পেজে ফেরত আসতে পারবেন। ধন্যবাদ।
                </h4>

            </div>
            <div class="row">
                <a href="home.php" class="btn btn-primary btn-lg" role="button">Continue</a>
            </div>

        </div>










    </body>

</html>
