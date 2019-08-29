<?php
include "authheader.php";
if($block == "false"){

include "header.php";

$file = "count.txt";
$size = filesize($file);
$open = fopen($file, "r");
$count = fread($open, $size);

$expval = explode("*-*",$count);
$count=$expval[0];
$count1=$expval[1];
fclose($open);

?>

<td align=center><br>

Copy the below code in to the pages where you want HBS (HIOX Web Browsers Statistics)
	<table width=400 height=100 align=center class=maintext>
        <tr>
        <td>
	<form name="select_all">
	<textarea style="color: green; font-size: 13px;" name="text_area" rows="8" cols="80" border=0px readonly>
        <?php
        	$url = $_SERVER['SCRIPT_FILENAME'];
                $pp = strrpos($url,"/");
                $url = substr($url,0,$pp);
                $ura = $_SERVER['SCRIPT_NAME'];
                $host = $_SERVER['SERVER_NAME'];
                $ser = "http://$host";
                $ura= $ser.$ura; 
                $pp1 = strrpos($ura,"/");
                $ura = substr($ura,0,$pp1);
		$url1=explode('/', $url);
		$url=array_pop($url1);
		$url1=implode('/', $url1);
		$ura1=explode('/', $ura);
		$ura=array_pop($ura1);
		$ura1=implode('/', $ura1);
echo "
&lt?php 
  $"."hm = \"$url1\"; 
  $"."hm2 = \"$ura1\"; 
  include \"$"."hm/HUC/huc.php\";
?&gt;";
        ?>
	</textarea><br><br>
	<input type="button" value="Select All" onClick="javascript:this.form.text_area.focus();this.form.text_area.select();">
	</form></td></tr>
	<tr><td>
	
	<table align=center valign=center bgcolor=c5d7ff align=center width=40% style="border: 1px #CE03FF solid; font-family: verdana, 
	arial, sans-serif; font-size: 13px;">
	
	<?php
	$starte = $_POST["starter"];
	$val = $_POST["strt"];

	if($starte == "startfrom" && $val != ""){
	
	$open2 = fopen($file,"w");
	fwrite($open2,"$expval[0]");
	fwrite($open2,"*-*");
	fwrite($open2,"$val");
	fclose($open2);
	}
	
	elseif($starte == "startfrom" && $val==""){
		echo "<div align=center>Empty values Not allowed</div>";
	}
	
	$fsize = file($file);
	$exp = explode("*-*",$fsize[0]);
	$count = $exp[0];
	$count1 = $exp[1];

	?>
	
        <form name=setf method=POST action=<?php echo $PHP_SELF;?>>
	       	<tr><td>Actual Count</td><td width=5></td><td><?php echo "$count"; ?></td></tr><tr height=5></tr>
		<tr><td>Increase Count By</td><td width=5></td>
		    <td><input name="strt" size="5" maxlength=20 type=text value=<?php echo "$count1"; ?> ></td>
		</tr>
		<tr>      	
		<td><input name="starter" type=hidden value="startfrom"></td><td width=5></td>
		<td><input type=submit value="  OK  "></td></tr><tr height=5></tr>
		<tr><td>Total Count</td><td width=5></td><td><?php 
						$hm = $url1;
						include "$hm/HUC/huc.php"; ?>
		</td></tr>

        </form>
	</table>
	
	</td></tr>
        </table>
	
	
	</td>
<?php
	include "footer.php";
	}
?>

