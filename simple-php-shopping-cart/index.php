<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "check_login":
		//echo "<pre>";print_r($_POST);echo "</pre>";
		$get_user = $db_handle->runQuery("SELECT * FROM users WHERE email='" . $_POST["user_email"] . "' AND password='" . $_POST["user_password"] . "'");
		//echo "<pre>";print_r($get_user);echo "</pre>";
		if(count($get_user)>0)
		{
			$_SESSION['user_id']=$get_user[0]['id'];
			$_SESSION['email']=$get_user[0]['email'];
			
			header("location: cart.php");
		}
		
	break;
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
//echo "<pre>";print_r($_SESSION["cart_item"]);echo "</pre>";
//echo "<pre>";print_r($itemArray);echo "</pre>";
?>
<HTML>
<HEAD>
<TITLE>Login</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>

<div id="product-grid">
	<div class="txt-heading">Login</div>
		<div class="product-item">
			<form method="post" action="index.php?action=check_login">
				<input type="text" name="user_email" id="user_email"><br>
				<input type="password" name="user_password" id="user_password"><br>
				
				<input type="submit" name="login" value="Login">
			</form>
		</div>
	
</div>
</BODY>
</HTML>