<?php
/* (c) copyright 2004, HIOX INDIA 		        */
/* This  is  a free tool provided by hioxidia.com */
/* visit us at http://www.hscripts.com            */

include "authheader.php";
if($block == false){
?>

	<html>
	<body style="margin: 0px; font-family: arial, verdana, san-serif; font-size: 14px;">
	<style>
	.evt{ color: #336644; text-decoration: none; }
	</style>
	<table width=100% height=100% cellpadding=0 cellspacing=0 bgcolor=#eeeedd valign=top 
	align=center style="font-family: arial, verdana, san-serif; font-size: 14px;">
	<?php include "head.php" ?>
	<tr><td height=95% align=center valign=top> 
	<br><br>

	<?php
	$upd = $_POST['updat'];

	if($upd == "updat")
	{
		$typae = $_POST['typae'];
		$col1 = $_POST['col1'];
		$col2 = $_POST['col2'];
		$col3 = $_POST['col3'];
		$col4 = $_POST['col4'];


		$open = fopen("size.php","w");
		fwrite($open,"<?php \n\n");
		fwrite($open,"$"."type=\"$typae\";\n");
		fwrite($open,"$"."col1=\"$col1\";\n");
		fwrite($open,"$"."col2=\"$col2\";\n");
		fwrite($open,"$"."col3=\"$col3\";\n");
		fwrite($open,"$"."col4=\"$col4\";\n");
		fwrite($open,"?> \n\n");
		echo "Updated size settings";
	}
	else
	{?>
		<script language=javascript>
			function tyype()
			{
				var sel = document.colf.typae.value;
				document.colf.ee1.value=sel;
				document.colf.ee2.value=sel;
				document.colf.ee3.value=sel;
				document.colf.ee4.value=sel;
			}
		</script>

		<?php 
		include "size.php";
		echo "<div align=center>SIZE of Table</div>";
		echo" <table height=40% width=40% cellpadding=0 cellspacing=0 bgcolor=#f4f5eb 
		align=center border=1 style=\"font-family: arial, verdana, san-serif; font-size: 14px;\">
		<tr align=center><td colspan=2><form name=colf method=post action=\"msize.php\">";
		echo "<input name=typae value=\"px\" type=hidden>";
		echo "</td></tr>
		<tr align=center><td>
		<input type=hidden value=updat name=updat></input>
		Column 1 </td><td><input type=text size=4 MAXLENGTH=3 value=\"$col1\" name=col1>
		<input type=text name=ee1 size=2 value=\"$type\" readonly></td></tr>
		<tr align=center><td>Column 2</td><td><input type=text size=4 MAXLENGTH=3 value=\"$col2\" name=col2>
		<input type=text name=ee2 size=2 value=\"$type\" readonly></td></tr>
		<tr align=center><td>Column 3</td><td><input type=text size=4 MAXLENGTH=3 value=\"$col3\" name=col3>
		<input type=text name=ee3 size=2 value=\"$type\" readonly></td></tr>
		<tr align=center><td>Column 4</td><td><input type=text size=4 MAXLENGTH=3 value=\"$col4\" name=col4>
		<input type=text name=ee4 size=2 value=\"$type\" readonly></td></tr>
		<tr align=center><td colspan=3>
		<input style=\"border:1px green solid;\" type=submit value=Update></td></tr>
		</table>";
	}
	?>
		<br><br>
		Enter size of table column in pixels.<br>
		If pixel is used scroll bar will be shown for overflow columns.

		

	</td></tr></table>
	</body>
	</html>
<?php
}
/* (c) copyright 2004, HIOX INDIA 		        */
/* This  is  a free tool provided by hioxidia.com */
/* visit us at http://www.hscripts.com            */
?>
