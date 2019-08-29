<?php
$file = "$hm/HUC/count.txt";
$size = filesize($file);
$open = fopen($file, "r");
$count = fread($open, $size);

$expval = explode("*-*",$count);


$count1 = $expval[0];
fclose($open);

$file1 = "$hm/HUC/ip.txt";
$lines = file($file1);

foreach ($lines as $line_num => $line)
{
$firstPos = strpos($line,'"');
$secPos = strpos($line,'"');
$ddate = substr($line,$firstPos+1,($secPos-$firstPos)-2);
break;
}

$dat = date('d');

$rip = $_SERVER['REMOTE_ADDR'];
if($dat != $ddate)
{
	//To write in to
	$open2 = fopen($file1, "w");
	fwrite($open2, "DATE= \"$dat\"");
	fwrite($open2, "\n\n$rip");
	fclose($open2);

	$open = fopen($file, "w");
	$count1=$count1+1;
	fwrite($open, $count1);
	fwrite($open,"*-*");
	fwrite($open,$expval[1]);
	fclose($open);
	$count = $count1;
}
else
{
	$open2 = fopen($file1, "r");
	$size = filesize($file1);
	$ips = fread($open2, $size);

	if(!strpos($ips,$rip))
	{
		$open = fopen($file, "w");
		fwrite($open, $count1);
		fclose($open);
		$count = $count1;

		$open3 = fopen($file1, "a");
		fwrite($open3,"\n\n");
		fwrite($open3, $rip);
		fclose($open3);
	}
	fclose($open2);
}
echo($count+$expval[1]);
?>

