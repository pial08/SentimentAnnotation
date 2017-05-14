<?php

session_start();
session_destroy();
unset($_SESSION['user']);
unset($_SESSION['count']);
if(isset($_SESSION['type']))
	{
    unset($_SESSION['type']);


  }
header("Location: index.php");

?>
