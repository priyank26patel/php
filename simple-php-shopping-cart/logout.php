<?php
session_start();
require_once("dbcontroller.php");

if(isset($_SESSION['user_id']) && isset($_SESSION['email']))
{
	session_destroy();
	header("location: index.php");
}

?>