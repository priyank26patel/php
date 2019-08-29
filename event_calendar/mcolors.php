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
	.cotxt{padding-left:7px; align:left }
	</style>
	<table width=100% height=100% cellpadding=0 cellspacing=0 bgcolor=#eeeedd valign=top 
	align=center style="font-family: arial, verdana, san-serif; font-size: 14px;">
	<?php include "head.php" ?>
	<!--tr><td height=40% style="border:2px #ededed groove"-->
	<tr><td height=95% align=center valign=top> 
	<br><br>

	<?php
	$upd = $_POST['updat'];

	if($upd == "updat")
	{
		$hcol = $_POST['hcol'];
		$oddcol = $_POST['oddcol'];
		$evencol = $_POST['evencol'];

		$open = fopen("colors.php","w");
		fwrite($open,"<?php \n\n");
		fwrite($open,"$"."hcolor=\"$hcol\";\n");
		fwrite($open,"$"."oddcolor=\"$oddcol\";\n");
		fwrite($open,"$"."evencolor=\"$evencol\";\n\n");
		fwrite($open,"?> \n\n");
		echo "Updated color settings";
	}
	else
	{
		include "colors.php";
		echo "<div align=center>Event Table Colors</div>";
		echo" <table width=33% height=40% cellpadding=0 cellspacing=0 bgcolor=#f4f5eb
		align=center border=0 style=\"font-family: arial, verdana, san-serif; font-size: 14px;\">
		<form name=colf method=post action=\"mcolors.php\">
		<input type=hidden value=updat name=updat></input>
		<tr><td class=cotxt>Header Column Color</td><td align=left><input size=8 type=text MAXLENGTH=7 value=$hcolor name=hcol></td></tr>
		<tr><td class=cotxt>Odd Column Color</td><td align=left><input size=8 type=text MAXLENGTH=7 value=$oddcolor name=oddcol></td></tr>
		<tr><td class=cotxt>Even Column Color</td><td align=left><input size=8 type=text MAXLENGTH=7 value=$evencolor name=evencol></td></tr>
		<tr> <td></td> <td align=left>
		<input style=\"border:1px green solid;\" type=submit value=Update></td></tr>
		</td></tr></table>";
	}
	?>

	</td></tr></table>
	</body>
	</html>
<?php
}

/* (c) copyright 2004, HIOX INDIA 		        */
/* This  is  a free tool provided by hioxidia.com */
/* visit us at http://www.hscripts.com            */

?>
