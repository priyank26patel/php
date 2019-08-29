<?php
$block = false;
@session_start();

$oout=$_GET['out'];
if($oout=="signout"){
	session_unset();
	session_destroy();
}
?>

	<html>
        <body style="margin: 0px; font-family: arial, verdana, san-serif; font-size: 14px;">
        <style>
        .evt{ color: #336644; text-decoration: none; }
        </style>
        <table width=100% height=100% cellpadding=0 cellspacing=0 bgcolor=#eeeedd valign=top
        align=center style="font-family: arial, verdana, san-serif; font-size: 14px;">
        <?php   include "head.php"  ?>
        <tr><td height=95% align=center valign=top>
        <br><br><br>



	<table width=62% height=190 align=center bgcolor=#f9f9f9 class=maintext style="border:1px #d9d9ce groove;">
	<tr><td style="color: green; font-size: 13px;">
	<ul type=circle><li>Hscripts.com is one of the most used free web resourse site online.</li>
	<li>This site started on 6.10.2004 and now has around 2,00,000 unique visitors every month.</li>
	<li>Free scripts will be available from the link: <a style="color: #0A3FFF; text-decoration: none;" href="http://hscripts.com/scripts/php">
http://hscripts.com/scripts/php</a></li>
	<li>Licensed scripts can be purchased from the link: <a style="color: #0A3FFF; text-decoration: none;" href="http://hscripts.com/scripts/php/licensed/index.php">
http://hscripts.com/scripts/php/licensed/index.php</a></li>
	<li>Hscripts.com is part of HIOX network of websites.</li>
	<li>HIOX network include sites as mentioned in the link: <a style="color: #0A3FFF; text-decoration: none;" href="http://hiox.com">
http://hiox.com</a></li>
	</ul>
	</td></tr></table>

</td></tr></table>
</body>
</html>

<!-- (c) copyright 2004, HIOX INDIA                 -->
<!-- This  is  a free tool provided by hscripts.com -->
<!-- Please get in touch with us for using          -->
<!-- this product in a commercial site.             -->
