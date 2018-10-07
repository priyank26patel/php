<?php
if ((($_FILES["file"]["type"] == "audio/mp3") //File type
    || ($_FILES["file"]["type"] == "audio/mp3"))
    && ($_FILES["file"]["size"] < 21000000))  //20MB File Size
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
        echo "";//another echo to display after upload is complete

        if (file_exists("mp3/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " already exists. ";
        }
        else
        {
            $conn = mysql_connect('localhost','root','');
            mysql_select_db('test',$conn);
            $filename = $_FILES["file"]["name"];
            echo $query = "insert into mp3 (mp3_file) values ('$filename')";
            mysql_query($query);

            move_uploaded_file($_FILES["file"]["tmp_name"],
                "mp3/" . $_FILES["file"]["name"]);

            header('location:audio_play.php');
        }
    }
}
else
{
    echo "Extension not allowed"; //Error message here if it's to big or wrong extension
}

?>