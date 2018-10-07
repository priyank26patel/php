<?php
include 'db.php';

$q="select * from employee";
$res=mysql_query($q);
?>
<table>
<tr>
    <td width="150"></td>
    <td width="150">name</td>
    <td width="150">telephone</td>
    <td width="150">email</td>
    <td width="150">image</td>
    <td colspan="2" width="200" align="center">Action</td>
</tr>
<?php
while ($r=mysql_fetch_array($res))
{
?>
<tr><td></td>
    <td><?php echo $r[1]  ?></td>
    <td><?php echo $r[2]  ?></td>
    <td><?php echo $r[3]  ?></td>
    <td><img src="../../img/<?php echo $r[4] ?>" width="200" height="200" /></td>
   <td><a href="edit.php?id=<?php echo $r[0] ?>">edit</a></td>
   <td><a href="delete.php?id=<?php echo $r[0] ?>">delete</a></td>
</tr>
    <?php
}
    ?>
</table>

<a href="form.php">add employee</a>