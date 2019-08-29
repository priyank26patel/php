<?php
include "authheader.php";
if($block == "false"){
include "header.php";
include "passwo.php";
?>

<td align=center>

<?php
$iswrite = $_POST['what'];
if($iswrite == "write")
{
    $uname = $_POST['uname'];
    $oldpword = $_POST['oldpwrd'];
    $oldpass = md5($oldpword);
    $newpword = md5($_POST['newpwrd']);
  
    if($uname!="" && $oldpass!="" && $newpword!=""){

    if($oldpass == $pass ){
	$filee = "passwo.php";
	$file1 = file($filee);
	$file = fopen($filee,'w');
	fwrite($file, "<?php \n");
	fwrite($file, "$");
	fwrite($file, "user=\"$uname\";\n");
	fwrite($file, "$");
	fwrite($file, "pass=\"$newpword\";");
 	fwrite($file, "\n?>");
	fclose($file);
    echo "<div align=center style='color: green;'><b>Password have been updated</div>";    
    }
    else{
	echo "<div align=center style='color: red;'><b>Invalid Username or Password </div>";
    }

    }
	
}
?>

<table bgcolor=efefef align=center style="border:2px c3d9ff groove; font-family: arial, verdana, san-serif; font-size: 14px;">
	<form name=fil method=post action="<?php echo "$PHP_SELF"; ?>">
	<tr><td colspan=2 align=center>Edit Password<br></td></tr>
	<tr><td>Change User</td><td><input type=text name=uname> </td></tr>
	<tr><td>Old PassWord</td><td><input type=password name=oldpwrd></td></tr>
	<tr><td>New PassWord</td><td><input type=password name=newpwrd></td></tr>
	<tr><td> </td><td>
	<input type=hidden value=write name=what>
	<input type='submit' value="submit"> </td></tr>
	</form>
</table></td>

</body>
</html>

<?php
}
include "footer.php";
?>

<!-- (c) copyright 2004, HIOX INDIA 		    -->
<!-- This  is  a free tool provided by hscripts.com -->
<!-- Please get in touch with us for using          -->
<!-- this product in a commercial site.             -->
