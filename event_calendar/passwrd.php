<?php
include "authheader.php";
if($block == false){

include "passwo.php";
?>

<html>
        <body style="margin: 0px; font-family: arial, verdana, san-serif; font-size: 14px;">
        <style>
        .evt{ color: #336644; text-decoration: none; }
        </style>
        <table width=100% height=100% cellpadding=0 cellspacing=0 bgcolor=#eeeedd valign=top
        align=center style="font-family: arial, verdana, san-serif; font-size: 14px;">
        <?php	include "head.php"  ?>
        <tr><td height=95% align=center valign=top>
        <br><br>


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
<table bgcolor=#f4f5eb align=center style="border:2px #e7e9db groove; font-family: arial, verdana, san-serif; font-size: 14px;">
	<form name=fil method=post action="<?php echo "$PHP_SELF"; ?>">
	<tr><td colspan=2 align=center>Edit Password<br></td></tr>
	<tr><td>Change User</td><td><input type=text name=uname> </td></tr>
	<tr><td>Old PassWord</td><td><input type=password name=oldpwrd></td></tr>
	<tr><td>New PassWord</td><td><input type=password name=newpwrd></td></tr>
	<tr><td> </td><td>
	<input type=hidden value=write name=what>
	<input type='submit' value="submit"> </td></tr>
	</form>
</table>

</td></tr></table>
</body>
</html>

<?php
}
?>

<!-- (c) copyright 2004, HIOX INDIA 		    -->
<!-- This  is  a free tool provided by hscripts.com -->
<!-- Please get in touch with us for using          -->
<!-- this product in a commercial site.             -->
