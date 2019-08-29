<?php
include "authheader.php";
if($block == false){
?>
	
	<html>
        <body style="margin: 0px; font-family: arial, verdana, san-serif; font-size: 14px;">
        <style>
        .evt{ color: #336644; text-decoration: none; }
        </style>
        <table width=100% height=100% cellpadding=0 cellspacing=0 bgcolor=#eeeedd valign=top
        align=center style="font-family: arial, verdana, san-serif; font-size: 14px;">
        <?php   include "head.php"  ?>
        <tr><td height=95% align=center valign=top>
        <br><br><br>
	

	<table width=400 height=250 align=center class=maintext>
        <tr><td height=10 style="font-size:14px;">Copy the below code in to the pages where you want HEC (HIOX Event Scheduler) to be displayed</td></tr>
	<tr><td valign=top>
	<form name="select_all">
	<textarea style="color: green; font-size: 13px; border:1px #d9d9ce groove" name="text_area" rows="4" cols="80" border=0px>
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
                echo "&lt?php 
	    $"."hm = \"$url1\"; 
	    $"."hm2 = \"$ura1\"; 
	    include \"$"."hm/HEC/calendar.php\";
        ?&gt;";
        ?>
	</textarea>
	<input type="button" value="Select All" onClick="javascript:this.form.text_area.focus();this.form.text_area.select();">
	</td></tr>
	</form>
        </table>

</td></tr></table>
</body>
</html>

<?php
}
?>
