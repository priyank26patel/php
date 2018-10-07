<?php
$id=$_GET['id'];
include 'db.php';

$q="delete from employee where id=$id";

if(mysql_query($q))
{
    header('location:view.php');
}
?>
