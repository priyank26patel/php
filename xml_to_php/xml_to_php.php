<?php
	//xml file path
	//$path = "http://104.239.228.200/aakronapi/api/gcc?login=officebeacon&password=test123&itemno=55075&color=0";
	//$path = "/var/www/html/priyank/xml_to_php/test.xml";
	//$path = "http://galaxyballoon.dyndns.org/OSN/OSN.xml";
	//$path = "http://localhost/priyank/xml_to_php/GCCDetail";
	$path = "http://104.239.228.200/aakronapi/api/GCCDetail?itemno=68622&color=0";


	//read entire file into string
	$xmlfile = file_get_contents($path);

	$xmlfile = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $xmlfile);
	$xmlfile = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $xmlfile);
	//$xmlfile = preg_replace('/[^\x00-\x7F]+/', '', $xmlfile);

	//$xmlfile = str_replace(array("\n", "\r", "\t"), '', $xmlfile);
	//$xmlfile = trim(str_replace('"', "'", $xmlfile));

	//convert xml string into an object
	$xml = simplexml_load_string($xmlfile) or die("Error: Cannot create string");
	//$xml = simplexml_load_file($path) or die("Error: Cannot create file");

	//convert into json
	$json  = json_encode($xml);

	//convert into associative array
	$xmlArr = json_decode($json, true);

	echo "<pre>";
	print_r($xmlArr);
	echo "</pre>";

?>

