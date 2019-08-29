<html>
<body style="margin: 0px; font-family: arial, verdana, san-serif; font-size: 14px;">
<style>
  .evt{ color: #336644; text-decoration: none; }
</style>
<table width=100% height=100% cellpadding=0 cellspacing=0 bgcolor=#eeeedd valign=top
align=center style="font-family: arial, verdana, san-serif; font-size: 14px;">
  <?php   include "head.php"  ?>
  <tr><td height=95% align=center valign=top>
  <br>

	<table width=60% height=300 align=center bgcolor=#f9f9f9 class=maintext>
	<tr><td style="color: green; font-size: 13px; padding-left: 50px">
 	<?php
		$file = "README.txt";
		$open = fopen($file, "r");
		$size = filesize($file);
		$count = nl2br(fread($open, $size));
		
		echo($count);
	?>
	</td></tr></table>

</td></tr></table>
</body>
</html>

