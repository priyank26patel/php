<?php
//sleep(1);
//$url = $_GET['url'];



/*if(file_exists($url) AND preg_match('/^[a-z0-9\/_\-.]+$/i',$url)){
	$width 	=	(isset($_GET['width']) 	AND preg_match('/^[0-9]{2,}$/', $_GET['width'])) 	? $_GET['width'] 	: 100;
	$height =	(isset($_GET['height']) AND preg_match('/^[0-9]{2,}$/', $_GET['height'])) 	? $_GET['height'] 	: 100;
	$left 	=	(isset($_GET['left']) 	AND is_numeric($_GET['left'])) 	? $_GET['left'] 	: 0;
	$top 	=	(isset($_GET['top']) 	AND is_numeric($_GET['top'])) 		? $_GET['top'] 		: 0;
	//header ("Content-type: image/jpg");
	$src 	= 	@imagecreatefromjpeg($url);
	$im	 	=	@imagecreatetruecolor($width, $height);
	imagecopy($im,$src,0,0,-$left,-$top,$width,$height);
	imagejpeg($im,"",100);
	imagedestroy($im);
}*/
?>

<?php
// Create image instances
$src = imagecreatefromjpeg('elkalidi_abdelkader.jpg');
$dest = imagecreatetruecolor(80, 40);

// Copy
imagecopy($dest, $src, 0, 0, 20, 13, 80, 40);

// Output and free from memory
//header('Content-Type: image/jpg');
imagejpeg($dest,"file.jpg");

imagedestroy($dest);
imagedestroy($src);
?>