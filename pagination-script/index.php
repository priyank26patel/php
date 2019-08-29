<html>
<head>
<title>Php Pagination Script for Multiple web pages</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table width="600"  height="200" border="0" cellpadding="0" cellspacing="0" align="center">
<?php
error_reporting(E_ALL);
require_once "config.php";
$link = mysql_connect($hostname, $username,$password);
$dbcon = mysql_select_db($dbname);
require_once "dbclass.php";
$dbc=new DB();
if(isset($_GET["page"]))	 
{
$page = intval($_GET["page"]);
}
else
{
$page = 1;
}
$endl = 1; 
$tot=$endl * $page;
$startl=$tot-$endl;
$pic=$startl+1;
$resall = $dbc->execute("select * from invent1 limit $startl,$endl");
$rowsl = $dbc->num_rows($resall);
if($rowsl)
{
$prev=0;
?>
<tr>
<td align="center"><h3>Php Pagination Script for Multiple web pages</h3></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<?php
while($res1=$dbc->fetch_array($resall))
{
?>
<tr>
	<td align="center"><img src="images/<?php echo $pic; ?>.jpg" alt="<?php echo $res1['info'];?>"/></td>
</tr>
<tr>
	<td align="center" style="font-size:12px">&emsp;&emsp;<?php echo $res1["info"];?></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<?php
$pic++;
}
}
?>
</table>
<table align="center" border="0" cellpadding="1" cellspacing="1">
<tr><td align="center">
<?php
if(isset($page))
{
	$rescount = $dbc->execute("select * from invent1");
	$rowscount = $dbc->num_rows($rescount);
	$num=$rowscount;
        $max_pages = ceil($num / $endl); 
	if($rowscount)
	{
	$res1 = $dbc->fetch_array($rescount);
	}
        
        if((($page > $max_pages) && ($max_pages!=0))||($page==0) )
        {
            echo "<font size=4px, color='#B03A51'><center>No Data</center></font><br/><br />";
        } 
}
$final=$dbc->paginate($endl,$page,$num,'index.php');
echo $final;

?>
</td>
</tr>
</table>
<br/>
<div align=center style=" font-size: 10px;color: #dadada;" id="dumdiv">
<a href="http://www.hscripts.com" id="dum" style="padding-right:0px; text-decoration:none;color: #dadada;">&copy;h</a>
</div>
</body>
</html>
