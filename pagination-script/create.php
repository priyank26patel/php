<!-- Welcome to the scripts database of HIOX INDIA      -->
<!-- This tool is developed and a copyright             -->
<!-- product of HIOX INDIA.			        -->
<!-- For more information visit http://www.hscripts.com -->

<?php

   $link = mysql_connect($hostname, $username,$password);
   $vv="";
   if($link)
   {

 	$dbcon = mysql_select_db($dbname);

	if($dbcon)
	{
	    $res1=mysql_query("create table invent1(info varchar(4000))",$link);
            $ins1=mysql_query("INSERT INTO invent1 VALUES('Cellophane tape-Richard G. Drew-1925.')",$link);
	    $ins2=mysql_query("INSERT INTO invent1 VALUES('AirPlane-Wilbur Wright and Orville Wright-1903.')",$link);
	    $ins3=mysql_query("INSERT INTO invent1 VALUES('Bandage-Earle Dickson-1921.')",$link);
	    $ins4=mysql_query("INSERT INTO invent1 VALUES('Bar codes-Norman Joseph Woodland-1973.')",$link);
	    $ins5=mysql_query("INSERT INTO invent1 VALUES('Bunsen burner-Robert Wilhelm Bunsen-1855.')",$link);
	    $ins6=mysql_query("INSERT INTO invent1 VALUES('Celsius thermometer-Anders Celsius-1742.')",$link);
	    $ins7=mysql_query("INSERT INTO invent1 VALUES('Radio-Nikola Tesla-1892.')",$link);
	    $ins8=mysql_query("INSERT INTO invent1 VALUES('Incandescent electric light-Humphry Davy-1800.')",$link);
	    $ins9=mysql_query("INSERT INTO invent1 VALUES('Kaleidoscope-Sir David Brewster-1817.')",$link);
	    $ins10=mysql_query("INSERT INTO invent1 VALUES('Parking meter-Carl Magee-1935.')",$link);
	    $ins11=mysql_query("INSERT INTO invent1 VALUES('Microscope-Zacharias Janssen-1595. ')",$link);
	    $ins12=mysql_query("INSERT INTO invent1 VALUES('Phonograph-Thomas Alva Edison-1877.')",$link);
	    $ins13=mysql_query("INSERT INTO invent1 VALUES('Polaroid camera-Edwin Herbert Land-1948.')",$link);
	    $ins14=mysql_query("INSERT INTO invent1 VALUES('Sandwich-John Montagu-1729.')",$link);
	    $ins15=mysql_query("INSERT INTO invent1 VALUES('Scrabble Game-Alfred Mosher Butts-1948.')",$link);
	    
	 
	 	if(!$res1)
		{
                    echo(" <table width=100% height=100% align=center><tr><td>
				<table bgcolor=#aaddaa align=center width=300 height=300><tr>
				<td style=\"color: #aa2233; font-size: 15px;\" align=center>
				 Unable to create tables.<br>");
		    echo("Your tables might have already been created.</td></tr></table> </td></tr></table>");
		    

		}
		else
                {
		  echo "<table align=center width=300 height=300>
       <tr>
           <td style=\"color: #aa2233; font-size: 15px;\" align=center>
                   HIOX DB Installation Manager
           </td>
       </tr>
       <tr bgcolor=#aaddaa>
           <td style=\"color: #000088; font-size: 14px; padding:10px;\">
                  You have succesfully installed the product.<br><br>
                  Do proceed to work with the product.<br>
                  <br>
                  This utility is provided by HIOX INDIA.<br><br>
                  For more details, visit <a href=\"http://www.hscripts.com\">hscripts.com</a>
		  <br>
		 
           </td>
       </tr>
    </table>";
		}
	}
	else
	{
		echo "inner else";
		$vv =false;
	}
   }
   else
   {
	echo "outer else";
	$vv =false;
   }


  
?>

<!-- Welcome to the scripts database of HIOX INDIA      -->
<!-- This tool is developed and a copyright             -->
<!-- product of HIOX INDIA.			        -->
<!-- For more information visit http://www.hscripts.com -->
