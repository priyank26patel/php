<?php
$conn = mysql_connect('localhost','root','');
mysql_select_db('test',$conn);
$query = "select * from mp3";
$row = mysql_query($query);

while($res = mysql_fetch_array($row))
{
?>
<div style="margin-bottom: 30px;">
<audio controls>
    <source src="mp3/<?php echo $res['mp3_file'] ?>" type="audio/mpeg">
</audio>
</div>
<?php
}
?>