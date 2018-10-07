<html>
<head>
<script>
function ValidateContactForm()
{
    var name = document.ContactForm.Name;
    var email = document.ContactForm.Email;
    var phone = document.ContactForm.Tel;
    var nocall = document.ContactForm.DoNotCall;
    var what = document.ContactForm.Subject;
    var comment = document.ContactForm.Comment;

    if (name.value == "")
    {
        window.alert("Please enter your name.");
        name.focus();
        return false;
    }
    
    if (phone.value == "")
    {
        window.alert("Please enter your telephone number.");
        phone.focus();
        return false;
    }
    
    if (email.value == "")
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf("@", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf(".", 5) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

    if (what.selectedIndex < 1)
    {
        alert("Please tell us how we can help you.");
        what.focus();
        return false;
    }

    if (comment.value == "")
    {
        window.alert("Please provide a detailed description or comment.");
        comment.focus();
        return false;
    }
    return true;
}

</script>
</head>
<body>
    <form name="ContactForm" method="post" action="" onsubmit="return ValidateContactForm();" enctype="multipart/form-data">
    <div>name:<input type="text" name="Name" /> </div>
    <div>telephone:<input type="text" name="Tel" /> </div>
   <div> email:<input type="text" name="Email" /> </div>
   <div> image:<input type="file" name="file" /> </div>
    <input type="submit" name="sub">
    </form>
</body>    
	
</html>

<?php

if(isset($_POST['sub']))
{
    $name=$_POST['name'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $file=$_FILES['file']['name'];
    $tmp=$_FILES['file']['tmp_name'];
    
    $path="C:/wamp/www/img/".$_FILES['file']['name'];
    
    move_uploaded_file($tmp, $path);
    
    include 'db.php';
    
    $query="insert into employee (id,name,num,email,image) values ('','$name','$tel','$email','$file')";
    echo $query;
    if(mysql_query($query))
    {
        header('location:view.php');
    }
    else
    {
        echo 'error ocurred';
    }
    
    
}

?>