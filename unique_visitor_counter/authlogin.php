
<table align=center height=100% width=75% border=0><tr><td valign=center>
<?php

require_once "passwo.php";

if($user == "" || $pass == ""){
	@include "newuser.php";

} //End of create new user table

else{
?>

<div align=center>
<?php
    if($xx == true)
	echo "<font color=red>Authentication Failed</font>";
?>
</div>
<table align=center valign=center bgcolor=#efefef align=center cellpadding=0 style="border: 1px #1f1f1f solid;">
<tr width=400 height=20><td align=center bgcolor="#bfbfbf"
style="color: #000000; font-family: arial,verdana,san-serif; font-size:13px;">
 Enter Admin Login Details </td></tr>
<tr width=400 height=20><td>
 <form name=setf method=POST action=<?php echo $PHP_SELF;?>>
        <table style="color:#121212; font-family: arial,verdana,san-serif; font-size:13px;">
        <tr><td>User Name</td><td><input class="ta" name="usern"  type=text maxlength=20 value=<?php echo "$un";?> >
		</td></tr>
        <tr><td>Password</td><td><input class="ta" name="passw" maxlength=20 type=password value=<?php echo "$pw";?> ></td></tr>
        <input name="type" type=hidden value="auth"></td></tr>
        <tr><td></td><td><input type=submit value="Enter"></td></tr>
        </table>
 </form>
</td></tr></table>

</td></td></table>
<?php
}
?>
