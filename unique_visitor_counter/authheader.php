<?php
session_start();
$ss = $_SESSION['HGB'];
if ($ss != "passed")
{
	$type = $_POST['type'];

	if($type=="auth")
	{	
	  include "checkauth.php";
	}else{
	 include "authlogin.php";
	 $block = "true";
	}
}else
{
	$block = "false";
}

?>
