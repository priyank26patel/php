<?php
/* (c) copyright 2004, HIOX INDIA 		        */
/* This  is  a free tool provided by hioxidia.com */
/* visit us at http://www.hscripts.com            */

$headersize = "15px";
$fontsize = "14px";
$dateformat = "m-d-y";

@include "colors.php";
@include "size.php";
?>

<?php 
@include "values.php";

$total = $col1+$col2+$col3+$col4;
$col1 = $col1."px";
$col2 = $col2."px";
$col3 = $col3."px";
$col4 = $col4."px";
?>


<table id=fds width=<?php echo "$total"; ?> align=center border=1 cellpadding=0 cellspacing=0
style="font-family: arial, verdana, san-serif;">
<tr style="font-size: <?php echo($headersize); ?>; color: #f9f9f9; font-weight:bold; height: 50px;" 
bgcolor=<?php echo($hcolor); ?> align=center width=100%>
<td width=$col1>Date</td>
<td width=$col2>Event</td><td width=$col3>Location</td><td width=$col4>Details</td></tr>
	<?php 
	$len = count($month);

	$kk = 0;
	$vals = true;
	for($i=0; $i<$len; $i++)
	{

		$today = time();
		$milli = mktime(0,0,0,$month[$i],$day[$i],$year[$i]);
		if($milli >= ($today-(60*60*24)) )
		{
			$kk = $kk+1;
			if($vals === true)
			{
				echo "<tr style=\"font-size: $fontsize;\" bgcolor=$oddcolor>";
				$vals = false;
			}			
			else
			{
				echo "<tr style=\"font-size: $fontsize;\" bgcolor=$evencolor>";
				$vals = true;
			}

			if($dateformat == "m-d-y")
				echo "<td align=center width=$col1> ".trim($month[$i])."-".trim($day[$i])."-".trim($year[$i])." </td>";
			else
				echo "<td align=center width=$col1> ".trim($day[$i])."-".trim($month[$i])."-".trim($year[$i])." </td>";

			echo "<td algin=center width=$col2 valign=center 
			style=\"padding-left: 3px; width:".$col2."px; height:60px; overflow:auto;\">$event[$i]</td>
			<td algin=center width=$col3 valign=center 
			style=\"padding-left: 3px; width:".$col2."px; height:60px; overflow:auto;\">$location[$i]</td>
			<td algin=center width=$col4 valign=center
			 style=\"padding-left: 3px; width:".$col3."px; height:60px; overflow:auto;\">$details[$i]</td></tr>";
		}	
	}

/* (c) copyright 2004, HIOX INDIA 		        */
/* This  is  a free tool provided by hioxidia.com */
/* visit us at http://www.hscripts.com            */
	?>
</td></tr>
</table>

