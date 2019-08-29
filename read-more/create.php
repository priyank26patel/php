<!-- Welcome to the scripts database of HIOX INDIA      -->
<!-- This tool is developed and a copyright             -->
<!-- product of HIOX INDIA.			        -->
<!-- For more information visit http://www.hscripts.com -->

<?php
error_reporting(0);
   $link = mysql_connect($hostname, $username,$password);

   if($link)
   {

 	$dbcon = mysql_select_db($dbname,$link);
	 
	if($dbcon)
	{
      	    $result = mysql_query("CREATE TABLE `$tablename` (id int(10) PRIMARY KEY auto_increment,comments varchar(150)) ",$link);
  		@mysql_free_result($link);
		if (!$result)
		{
		    echo(" <table width=100% height=100% align=center><tr><td>
				<table bgcolor=#aaddaa align=center width=300 height=300><tr>
				<td style=\"color: #aa2233; font-size: 15px;\" align=center>
				 Unable to create tables.<br>");
		    echo("Your tables might have already been created.</td></tr></table> </td></tr></table>");
		}
		else
    {       
		  $fields="INSERT INTO $tablename(`id`, `comments`) VALUES  (1, 'Joe: Hello, Magi. How are you?'), (2, 'Magi: I am fine and what about you?'), (3, 'Joe: I am fine too. It is long time since I me...'), (4, 'Magi: But we have kept constant contact over mob...'), (5, 'Joe: Yes, this mobile phone has become a very...'), (6, 'Magi: Right. It has reduced uncertainty, doubt,...'), (7, 'Joe: Ya..It is very ture...'), (8, 'Magi : Ok Joe...Catch you later..Take Care...')";
		  $res=mysql_query($fields);

        echo "<table align=center width=300 height=300>
       <tr>
           <td style=\"color: #aa2233; font-size: 15px;\" align=center>
                   HIOX DB Installation Manager
           </td>
       </tr>
       <tr bgcolor=#aaddaa>
           <td style=\"color: #000088; font-size: 14px; padding:10px;\">
                  You have succesfully installed the product.<br>
                  Do proceed to work with the product.<br>
                  <br>
                  This utility is provided by HIOX INDIA.<br>
                  For more details log on to <a href=\"http://www.hscripts.com\">hscripts.com</a>
           </td>
       </tr>
    </table>";
		}
	}
	else
	{
		$vv =false;
	}
   }
   else
   {
	$vv =false;
   }

   if($vv === false)
   {
       echo	"<table width=100% height=100% align=center><tr><td>
		<table bgcolor=#aaddaa align=center width=300 height=300><tr>
			<td style=\"color: #aa2233; font-size: 15px;\" align=center>";
       echo "<form method=POST action=>";
       echo "<input type=hidden name=type value=changedb>";
       echo "<br><br><br>Unable to connect to the database. <br>
        	Please check your database entries <br><input type=submit value=dbentries>";
       echo "</form>";
       echo(" </td></tr></table> </td></tr></table>");

   }
?>

<!-- Welcome to the scripts database of HIOX INDIA      -->
<!-- This tool is developed and a copyright             -->
<!-- product of HIOX INDIA.			        -->
<!-- For more information visit http://www.hscripts.com -->
