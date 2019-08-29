<form method="post" action="" enctype="multipart/form-data">

<?php
$id=$_GET['id'];
include 'db.php';

$q="select * from employee where id=$id";
$res=mysql_query($q);

$r=mysql_fetch_array($res);


?>

<input type="text" name="name1" value="<?php echo $r[1] ?>" /><br>
 <input type="text" name="tel1" value="<?php echo $r[2] ?>" /><br>
   <input type="text" name="email1" value="<?php echo $r[3] ?>" /><br>
    <input type="file" name="file1" value="<?php echo $r[4] ?>" /> <br>
    <input type="submit" name="edit">
</form>




   <?php

   if(isset($_POST['edit']))
   {
    $name1=$_POST['name1'];
    $tel1=$_POST['tel1'];
    $email1=$_POST['email1'];
    $file1=$_FILES['file1']['name'];
    $tmp1=$_FILES['file1']['tmp_name'];
    
    $path1="C:/wamp/www/img/".$_FILES['file1']['name'];
    move_uploaded_file($tmp1, $path1);
    
    $edit="update employee set name='$name1', num='$tel1', email='$email1', image='$file1' where id=$id";
    if(mysql_query($edit))
    {
        header('location:view.php');
    }
    else
    {
        echo 'edit tm error';
    }
   }
 
   ?>