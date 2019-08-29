<?php ob_start(); ?>
<?php session_start();
$a = $_SESSION['Username'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HOMEWORK-4</title>
</head>

<body>
<?php session_start();
if(isset($_SESSION['Username']))
{
?>
<h2><center>UPLOAD PHOTO</center></h2>
<table width="150px" align="right"><tr><td align="right">WELCOME</td><td align="left" bgcolor="#FFD700"><b><i> <?php echo $a;?>|</i></b></td><td align="right"><a href="logout.php">LOGOUT</a></td></tr><tr><td width="100%" colspan="3" align="center"><a href="main.php">GO BACK</a></td></tr></table>
<br/><br/><br/><br/>

<form enctype="multipart/form-data" name="f1" method="POST" action="upload.php" >
<table width="840px" border="2">
<tr><td colspan="2" align="center"><i><b>UPLOAD PHOTO</b></i></td></tr>
<tr><td>* ENTER PHOTO NAME:<input type="text" name="t1" value="<?php echo $_POST['t1'];?>"> <a style="background-color:#E7ED67">PLEASE DO NOT INCLUDE FILE EXTENSION OR "." IN PHOTO NAME</a></td></tr>
<tr><td>* SELECT PHOTO:<input name="image" accept="image/jpeg" type="file"><a style="background-color:#E7ED67">PLEASE UPLOAD A PHOTO LESS THAN 1MB</a></td></tr>
<tr><td colspan="2">* ENTER CAPTION FOR PHOTO:<input type="text" name="t2" value="<?php echo $_POST['t2'];?>"></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="Submit" name="submit"></td></tr>
</table>
</form>
<?php
if (!empty($_POST))
 		{
	if(isset($_POST["submit"])) 
			{
			
			if(!$_POST["t1"] || !$_POST["t2"] || !isset($_FILES['image']))
			echo "<br/><br/><br/><b>PLEASE ENTER ALL THE REQUIRED FIELDS</b>";
			else
			{
		   $maxsize = 1045000;
			$size = filesize($_FILES['image']['tmp_name']);
	if(($size < $maxsize) && (is_uploaded_file($_FILES['image']['tmp_name'])!= false))
    {
	$a1=$_POST["t1"];
	$b1=$_POST["t2"];
	$name = $_FILES['image']['name'];
	$userfile_extn = explode(".",$_FILES['image']['name']);
	$zam1=strtolower($userfile_extn[1]);
	$a1=$a1."".".".strtolower($userfile_extn[1]);
   
  

$handle = fopen($_FILES['image']['tmp_name'], "rb");
$img = fread($handle, filesize($_FILES['image']['tmp_name']));
fclose($handle);
$img = base64_encode($img);


$link = mysql_connect('ecsmysql', 'cs431s17', 'quaicohm');
            if (!$link)
          {
             die('Could not connect: ' . mysql_error());
             }			 
mysql_select_db("cs431s17",$link);			 




$r=mysql_query("INSERT INTO PHOTOS(PhotoName, caption, photodata, Username) VALUES ('$a1','$b1','$img','$a')",$link);
if($zam1=="jpeg" || $zam1=="jpg" || $zam1=="gif" || $zam1=="bmp" || $zam1=="png" )
{
if($r==1)
{
echo "<br/><br/><br/><b>PHOTO WITH THE<i> ";echo $a1;echo " </i> PHOTO NAME UPLOADED SUCESSFULLY</b>";
}
else
{
echo "<br/><br/><br/><b>FILE NOT UPLOADED PROPERLY</b>";
}
}
else
{
echo "<br/><br/><br/><b>FILE FORMAT NOT SUPPORTED</b>";
}

		
}
else
{
echo "<br/><br/><br/><b>UPLOAD THE FILE OR SELECT SMALLER SIZE FILE </b>";
}
			
			
			
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
