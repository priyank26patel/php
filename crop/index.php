<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"  />
<title>Thumbnail Drag then Crop using mootools like facebook</title>
<meta name="robots" content="follow, all" />
<script src="mootools-1.2.3-core-yc.js" type="text/javascript"></script>
<script src="mootools-1.2.3.1-more.js" type="text/javascript"></script>
<script type="text/javascript">
window.addEvent('load', function(){
/********************************/
/*  	Drag in div Script		*/
/********************************/
	var DivID		=	$('CropFrom');
	var ImgID		=	$('CropMe');
	var InputUrlID	=	$('UrlID');
	var InputTopID	=	$('TopID');
	var InputLeftID	=	$('LeftID');
	
	InputUrlID.set('value',ImgID.get('src'));	// Add URL to form
	var DragInDiv = new Drag(DivID, {
		modifiers: {
			x: 'scrollLeft', 
			y: 'scrollTop'
		},
		style: false,
		invert: true,
		onSnap: function(el){
			ImgID.setStyles({'opacity':0.5})
		},
		onComplete: function(el){
			ImgID.setStyles({'opacity':1})
			InputTopID.set('value',	ImgID.getCoordinates(DivID).top); // Add new TOP to form
			InputLeftID.set('value',	ImgID.getCoordinates(DivID).left); // Add new LEFT to form
		}
	});
/********************************/
/*  		Ajax Crop			*/
/********************************/
	$('GenerateMe').addEvent('click', function(e){
		e.stop();
		alert(InputUrlID.get('value'));
		var newImage	=	'crop.php?url='+InputUrlID.get('value')+'&top='+InputTopID.get('value')+'&left='+InputLeftID.get('value');
		alert(newImage);
		$('AjaxId').empty().addClass('ajax-loading').set('html', '<img src="'+newImage+'" alt="New image" />');
	})
});
</script>
<style type="text/css">
/* Style of page */
body{
	margin:0;
	font-size:15px;
	font-family:georgia;
}
a{
	color:#000;
	text-decoration:none;
}
a:hover{
	text-decoration:underline;
}
h1{
	font-style:italic;
	font-weight:normal;
	margin:0 0 5px 0;
	font-size:40px;
}
p{
	padding:0 0 30px 0;
	margin:0;
}
div.content{
	text-align:center;width:460px;margin:0 auto;padding:20px
}
div#AjaxId{
	height		:	100px;
	width		:	100px;	
	margin		:	30px auto;
}
.ajax-loading{
	background:url(spinner.gif) center center no-repeat;
}
/* What script need */
#CropFrom {
	height		:	100px;
	width		:	100px;
	overflow	:	hidden;
	cursor		:	move;
	margin		:	0 auto;
}
</style>
</head>
<body>
<div class="content">

	<h1><a href="http://updel.com/drag-and-crop-picture-inside-box/" title="Drag and Crop image inside a box using Mootools">Drag and Crop image using Mootools</a></h1>
	<p>This example shows how to drag an image relative to a div<br />and then retrieve the coordinates</p>
	<!-- Script start here -->
		<div id="CropFrom">
			<img id="CropMe" src="elkalidi_abdelkader.jpg"  />
		</div>
		<input id="UrlID" type="hidden" name="url" value="" />
		<input id="TopID" type="hidden" name="top" value="0" />
		<input id="LeftID" type="hidden" name="left" value="0" />
	<!-- End -->
	Drag me<br /><br />
	<input type="button" id="GenerateMe" value="Generate image" />
	<div id="AjaxId"></div>
</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7468172-8");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>

</html>
