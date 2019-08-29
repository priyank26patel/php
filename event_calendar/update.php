<?php
/* (c) copyright 2004, HIOX INDIA 		        */
/* This  is  a free tool provided by hioxidia.com */
/* visit us at http://www.hscripts.com            */

include "authheader.php";
if($block == false){
?>


	<html>
	<body style="margin: 0px; font-family: arial, verdana, san-serif; font-size: 16px;">
	<style>
	.evt{ color: #336644; text-decoration: none; }
	</style>
	<table width=100% height=100% cellpadding=0 cellspacing=0 bgcolor=#eeeedd valign=top 
	align=center style="font-family: arial, verdana, san-serif; font-size: 14px;">
	<?php include "head.php" ?>
	<tr><td height=95% align=center valign=top> 
	<br><br>

	<?php
	$upd = $_POST['updat'];

	if($upd == "updat")
	{
		$tot = $_POST['total'];
		$open = fopen("values.php","w");
		$man = 0;

		fwrite($open,"<?php \n\n");
		while($man <= $tot-1){
			$month[$man] = $_POST['month'.$man];
			$day[$man] = $_POST['day'.$man];
			$year[$man] = $_POST['year'.$man];
			$event[$man] = $_POST['event'.$man];
			$location[$man] = $_POST['location'.$man];
			$details[$man] = $_POST['details'.$man];
			$mycombo[$man] = $_POST['mycombo'.$man];
		
			$man= $man+1;
			}

		$month[$man] = $_POST['nmonth'];
		$day[$man] = $_POST['nday'];
		$year[$man] = $_POST['nyear'];
		$event[$man] = $_POST['nevent'];
		$location[$man] = $_POST['nlocation'];
		$details[$man] = $_POST['ndetails'];
		
		$dd = 0;
		while($dd <= $man)
		{
			if($month[$dd] != "" && $day[$dd] != "" && $year[$dd] != "" && $mycombo[$dd] != "on")
			{
				if($dd == $man)
				{
					$today = time();
					$milli = mktime(0,0,0,$month[$dd],$day[$dd],$year[$dd]);
					if($milli >= ($today-(60*60*24)))
						$aray[$dd] = $milli;
				}
				else
				{
					$vale = mktime(0,0,0,$month[$dd],$day[$dd],$year[$dd]);
					$aray[$dd] = $vale;
				}
			}
			$dd = $dd+1;
		}

		$arayorg = $aray;		
		@sort($aray);
		
		$dd = 0;
		while($dd < count($aray))
		{
			$valss = $aray[$dd];
			$pos = array_search($valss,$arayorg);
			
			$arayorg[$pos] = "0000";
			$aray[$dd] = "0000";
			
			if($month[$pos] != "" && $day[$pos] != "" && $year[$pos] != "")
			{
        $evnt = stripslashes($event[$pos]);
			  $det = stripslashes($details[$pos]);
				fwrite($open,"$"."month[$dd] = \"$month[$pos]\";\n");
				fwrite($open,"$"."day[$dd] = \"$day[$pos]\";\n");
				fwrite($open,"$"."year[$dd] = \"$year[$pos]\";\n");
				fwrite($open,"$"."event[$dd] = \"$evnt\";\n");
				fwrite($open,"$"."location[$dd] = \"$location[$pos]\";\n");
				fwrite($open,"$"."details[$dd] = \"$det\";\n\n");	
			}
			$dd = $dd+1;
		}
		fwrite($open,"?>");

		
		echo "Updated the Events";
	}
	else
	{
	?>

	<script language=javascript>
	function DaysInMonth(Y, M) {
	    with (new Date(Y, M, 1, 12)) {
          setDate(0);
         return getDate();
       }
	}

	function check(ee)
	{
		var val = ee.value;
		if(isNaN(val))
			ee.value = "0";
	}

	function change(dd)
	{
		var val = dd.value;
		if(isNaN(val))
			dd.value = "0";

		var mon = document.evet.nmonth.value;
		var year = document.evet.nyear.value;
		var days = DaysInMonth(year,mon);
		var nday = document.evet.nday;
		while(nday.hasChildNodes())
		{
			nday.removeChild(nday.firstChild);
		}
	
		for(var j=1; j<=days; j++)
		{
			var opt = document.createElement("option");
			opt.setAttribute("name",j);
			opt.setAttribute("value",j);
			var ttext =document.createTextNode(j);
		
			opt.appendChild(ttext);
			nday.appendChild(opt);
		}

		
		
	}
	</script>


	<table width=90% align=center border=1 cellpadding=0 cellspacing=0
		style="font-family: arial, verdana, san-serif; font-size: 14px;">
	<tr align=center style="background-color: #000000; 
	color: #ffffff; font-weight: bold;">
	<td>No</td><td>Date</td><td>Event</td><td>Location</td><td>Details</td><td>To Delete</td></tr>
	<?php 
		include "values.php";
		$len = count($month);
		echo "<form name=evet method=POST action=update.php>";
		$kk = 1;
		$t = 1;
		for($i=0; $i<$len; $i++)
		{
			$kk = $kk+1;
	
			$today = time();
			$milli = mktime($hour[$i],$min[$i],0,$month[$i],$day[$i],$year[$i]);
		
			if($milli >= ($today-(60*60*24)))
			{
				echo "<tr align=center><td>$t</td><td><table cellpadding=0 cellspacing=0 border=0><tr align=center>
				<td>M<br><input size=1 name=month$i value=\"$month[$i]\" MAXLENGTH=2 onkeyup=\"check(this)\"></input></td>
				<td>D<br><input size=1 name=day$i value=\"$day[$i]\" MAXLENGTH=2 onkeyup=\"check(this)\"></input></td>
				<td>Y<br><input size=4 name=year$i value=\"$year[$i]\" MAXLENGTH=4 onkeyup=\"check(this)\"></input></td>
				</tr></table>
				</td>
	
				<td><textarea rows=4 cols=16 align=absmiddle name=event$i value=\"$event[$i]\">$event[$i]</textarea></td>
				<td><textarea name=location$i align=absmiddle rows=4 cols=12  value=\"$location[$i]\">$location[$i]</textarea></td>
				<td><textarea name=details$i rows=4 align=absmiddle cols=16 value=\"$details[$i]\">$details[$i]</textarea></td>
				<td><input type=checkbox name=mycombo$i></td></tr>";
				$t = $t+1;
			}
		}

		$year = date('Y');
		echo "<tr bgcolor=#e7e8dd align=center><td colspan=7><b>New Event</b></td></tr align=center>
			<tr bgcolor=#e0e5dd align=center><td>$t</td>
			<td><table cellpadding=0 cellspacing=0 border=0><tr align=center>
			<td>M<br><select name=nmonth onchange=\"change(this)\" style=\"font-size: 12px;\">";
			for($kl=1; $kl < 13; $kl++)
				echo "<option name=$kl value=$kl>$kl</option>";
			echo "</select></td>
			<td>D<br><select name=nday style=\"font-size: 12px;\">";
			for($kl=1; $kl < 30; $kl++)
				echo "<option name=$kl value=$kl>$kl</option>";
			echo "</select></td>
			<td>Y<br><input size=4 name=nyear style=\"font-size: 12px;\" MAXLENGTH=4 value=$year onkeyup=\"change(this)\"></input></td>
			</tr></table>
			</td>	
			<td><textarea rows=4 cols=15 style=\"overflow:auto;\" name=nevent> </textarea></td>
			<td><textarea rows=4 cols=12 name=nlocation></textarea></td>
			<td><textarea rows=4 cols=15 name=ndetails></textarea></td><td></td></tr>
			<tr bgcolor=#f3f3f3><td colspan=7 align=center> 
			<input type=hidden name=total value=$kk>
			<input type=hidden name=updat value=updat>
			<input type=submit value=UPDATE style=\"border:1px green solid;\">
			</input>
			</td><tr>";
		echo "</form>";
		?>
		</table>
	
	<br> <br><br>
	<?php
	}
	?>

	</td></tr></table>
	</body>
	</html>
<?php
}

/* (c) copyright 2004, HIOX INDIA 		        */
/* This  is  a free tool provided by hioxidia.com */
/* visit us at http://www.hscripts.com            */
?>
