<table align=center width=72% height=95% ><tr><td>

<?php
$creat = "true";
include "passwo.php";
$iswrite = $_POST['createe'];

if($user=="" && $pass==""){

if($iswrite == "creatuser")
{
    $usname = $_POST['usernam'];
    $passwrd = md5($_POST['pword']);

    if($usname != "" && $passwrd != ""){
	$filee = "passwo.php";
	$file1 = file($filee);
        $file = fopen($filee,'w');
        fwrite($file, "<?php \n");
        fwrite($file, "$");
        fwrite($file, "user=\"$usname\";\n");
        fwrite($file, "$");
        fwrite($file, "pass=\"$passwrd\";");
        fwrite($file, "\n?>");
        fclose($file);

    $creat = "false";	
    echo "<div align=center style='color: green;'><b>New User Created
		<meta http-equiv=\"refresh\" content=\"2; code.php\">
		<br>Please Wait You will be Redirected to Login Page
	  </div>";

    }
    else{
        echo "<div align=center style='color: red;'><b>Enter correct Username or Password </div>";
    }
}
if($creat == "true"){
?>

<table align=center valign=center bgcolor=#efefef align=center cellpadding=0 style="border: 1px #1f1f1f solid;">
<tr width=400 height=20><td align=center bgcolor="#bfbfbf"
style="color: #000000; font-family: arial,verdana,san-serif; font-size:13px;">
 Create New User </td></tr>
     <tr width=400 height=20><td>
        <form name=setf method=POST action=<?php echo $PHP_SELF;?>>
        <table style="color:#121212; font-family: arial,verdana,san-serif; font-size:13px;">
        <tr><td>User Name</td><td><input class="ta" name="usernam"  type=text maxlength=20 >
                </td></tr>
        <tr><td>Password</td><td><input class="ta" name="pword" maxlength=20 type=password></td></tr>
        <input name="createe" type=hidden value="creatuser"></td></tr>
        <tr><td></td><td><input type=submit value="create"></td></tr>
        </table>
 </form>
</td></tr></table>

<?php
}

}else{
	echo "<div align=center style='color: red;'><b>User Already Exist</div>";
}
?>
</td></tr></table>
