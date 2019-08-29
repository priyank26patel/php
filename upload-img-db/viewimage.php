<?php ob_start(); ?>
<?php session_start();
$a = $_SESSION['Username'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>HOMEWORK-4</title>
</head>

<body>
<?php session_start();
if(isset($_SESSION['Username']))
{
?>
<h2><center>VIEW PHOTOS</center></h2>
<table width="150px" align="right"><tr><td align="right">WELCOME</td><td align="left" bgcolor="#FFD700"><b><i> <?php echo $a;?>|</i></b></td><td align="right"><a href="logout.php">LOGOUT</a></td></tr><tr><td width="100%" colspan="3" align="center"><a href="main.php">GO BACK</a></td></tr></table>
<br/><br/><br/><br/>

<form name="f2" method="POST" action="viewimage.php">
<table width="600px" border="2" align="center">
	<tr><td><center><b><i>SEARCH FOR PHOTO</i></b></center></td></tr>
	<tr>
	<td align="left">
	ENTER THE PHOTO NAME OR CAPTION FOR SEARCH: <input  type="text" name="data" value="<?php echo $_POST['data'];?>">
	</td></tr>
	<tr>
	<td align="center" >
	<input type="submit" value="Submit" name="submit"> 
	</td></tr>
</table>
</form>
<br/><br/><br/><br/>
<?php
$link = mysql_connect('ecsmysql', 'cs431s17', 'quaicohm');
            if (!$link)
          {
             die('Could not connect: ' . mysql_error());
             }			 
mysql_select_db("cs431s17",$link);	


if (!empty($_POST))
 		{
	if(isset($_POST["submit"])) 
			{
			$d ="".$_POST["data"];
				if(!empty($d))
					{
					
			    
				$result = mysql_query("SELECT * FROM PHOTOS WHERE (PhotoName LIKE '$d.%' OR caption LIKE '%$d%') AND Username='$a'",$link);
				$j=mysql_numrows($result);
				if($j==1)
				{
				echo "<center><br/><br/><b>";echo $j; echo " PHOTO FOUND FOR THIS DATA</b></center><br/><br/><br/>";
				
				$p=mysql_result($result,$i,"PhotoName");
			    $userfile_extn = explode(".",$p);
			    $p=$userfile_extn[0];
			    $p65=$userfile_extn[1];
				$p13=$p;
				$p14=mysql_result($result,$i,"caption");
				$p15=mysql_result($result,$i,"photodata");
				
				if($p65=="jpeg")
				{
				echo '<table border="2" align="center" width="600px"><tr><td align="center"><img src="data:image/jpeg;base64,' .$p15. '" width="290" height="290"></td></tr> ';
				?>
				<tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO NAME:".$p13; ?></b></td></tr><tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO CAPTION:".$p14; ?></b></td></tr></table>
				
				<?php
				
				}
				else if($p65=="jpg")
				{
				echo '<table border="2" align="center" width="600px"><tr><td align="center"><img src="data:image/jpg;base64,' .$p15. '" width="290" height="290"></td></tr> ';
				?>
				<tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO NAME:".$p13; ?></b></td></tr><tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO CAPTION:".$p14; ?></b></td></tr></table>
				
				<?php
				}
				else if($p65=="gif")
				{
				echo '<table border="2" align="center" width="600px"><tr><td align="center"><img src="data:image/gif;base64,' .$p15. '" width="290" height="290"></td></tr> ';
				?>
				<tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO NAME:".$p13; ?></b></td></tr><tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO CAPTION:".$p14; ?></b></td></tr></table>
				
				<?php
				}
				else if($p65=="bmp")
				{
				echo '<table border="2" align="center" width="600px"><tr><td align="center"><img src="data:image/bmp;base64,' .$p15. '" width="290" height="290"></td></tr> ';
				?>
				<tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO NAME:".$p13; ?></b></td></tr><tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO CAPTION:".$p14; ?></b></td></tr></table>
				
				<?php
				}
				else if($p65=="png")
				{
				echo '<table border="2" align="center" width="600px"><tr><td align="center"><img src="data:image/png;base64,' .$p15. '" width="290" height="290"></td></tr> ';
				?>
				<tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO NAME:".$p13; ?></b></td></tr><tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO CAPTION:".$p14; ?></b></td></tr></table>
				
				<?php
				}

				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				}
				else if($j==0)
				{
				echo "<br/><br/><b> NO PHOTO FOUND FOR THIS DATA </b>";
				}
				else
				{
				echo "<center><br/><br/><b>";echo $j; echo " PHOTOS FOUND FOR THIS DATA</b></center><br/><br/><br/>";
				
				
				
				for($i=0; $i<$j; $i++)
					{
			    $p=mysql_result($result,$i,"PhotoName");
			    $userfile_extn = explode(".",$p);
			    $p=$userfile_extn[0];
			    $p65=$userfile_extn[1];
				$p13=$p;
				$p14=mysql_result($result,$i,"caption");
				$p15=mysql_result($result,$i,"photodata");
			  
			  if($p65=="jpeg")
				{
				echo '<table border="2" align="center" width="600px"><tr><td align="center"><img src="data:image/jpeg;base64,' .$p15. '" width="290" height="290"></td></tr> ';
				?>
				<tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO NAME:".$p13; ?></b></td></tr><tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO CAPTION:".$p14; ?></b></td></tr></table>
				
				<?php
				
				}
				else if($p65=="jpg")
				{
				echo '<table border="2" align="center" width="600px"><tr><td align="center"><img src="data:image/jpg;base64,' .$p15. '" width="290" height="290"></td></tr> ';
				?>
				<tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO NAME:".$p13; ?></b></td></tr><tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO CAPTION:".$p14; ?></b></td></tr></table>
				
				<?php
				}
				else if($p65=="gif")
				{
				echo '<table border="2" align="center" width="600px"><tr><td align="center"><img src="data:image/gif;base64,' .$p15. '" width="290" height="290"></td></tr> ';
				?>
				<tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO NAME:".$p13; ?></b></td></tr><tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO CAPTION:".$p14; ?></b></td></tr></table>
				
				<?php
				}
				else if($p65=="bmp")
				{
				echo '<table border="2" align="center" width="600px"><tr><td align="center"><img src="data:image/bmp;base64,' .$p15. '" width="290" height="290"></td></tr> ';
				?>
				<tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO NAME:".$p13; ?></b></td></tr><tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO CAPTION:".$p14; ?></b></td></tr></table>
				
				<?php
				}
				else if($p65=="png")
				{
				echo '<table border="2" align="center" width="600px"><tr><td align="center"><img src="data:image/png;base64,' .$p15. '" width="290" height="290"></td></tr> ';
				?>
				<tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO NAME:".$p13; ?></b></td></tr><tr><td align="center" bgcolor="#DB8F28"><b><?php echo "PHOTO CAPTION:".$p14; ?></b></td></tr></table>
				
				<?php
				}
			  
	
				
				echo "<br/><br/><br/>";
				}
		
				
				
				}
				
					
					
					}
					else
					{
					echo "<br/><br/><b>PLEASE ENTER PHOTO NAME OR CAPTION FOR SEARCH FIELDS</b>";
					}
					
					}
					
					}







?>
<?php

}
else
{
echo "<b>PLEASE LOGIN TO LOGIN WINDOW TO CONTINUE    ---------></b>";?>
<h3 align="right"><a href="index.php">GO TO LOGIN WINDOW</a></h3>

<?php
}
?>


</body>
</html>
