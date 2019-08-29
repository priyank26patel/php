<?php
include "config.php";
$Qid = $_POST['id'];
$limitval = $_POST['limit'];
$cn=mysql_connect($hostname,$username,$password);
if(!$cn)
{
   // echo "database not connected";
    
}
else{
  //  echo "dtabase selected";
}

$link=mysql_selectdb($dbname,$cn);
if(!$link)
{
   // echo "Table not selected";
    
}
else
{
   // echo "table selected";    
}
$DisplayMore = mysql_query("SELECT * FROM $tablename limit $Qid,$limitval");
while($row = mysql_fetch_array($DisplayMore))
    {
        ++$Qid;
	$comment =  $row['comments']; // change your field name here instead of comments
        echo "<table align='center' border='0' id='disptable'><tr>
        <td align='center'>$comment</td></tr></table><br>";
    }
    echo "**$$**$Qid";
?>