<html>
	<head>
		<title>Responsive Php Highlight Search Text Script | Highlighting Matched Words </title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<p align='center'><b> Highlighting Matched Words</b></p>
<div id='container' class='container'>
<?php
error_reporting(0);
$txt=$_POST['txtword'];
?>
<form name='frm' method='post' action=''>
    <div id='searchbox' class='searchbox'>
		<input type='text' autocomplete='off' name='txtword' value="<?php echo $txt; ?>" size='8' placeholder='Search in the text'>
   
         <input type='submit' name='txtsubmit' value='search'>
    </div>              
</form>
<?php
error_reporting(0);
$word=$_POST['txtword'];
?>
<span>
    <?php
    $searchtext="Welcome to Hscripts.com.
    Praised as the best free webmaster resources online, by our users.
    If you are designing a website, then you can find all the resources you
    need for webmasters and web developers such as free scripts, web tools, programming tutorials,
    web design and applications, clipart images, web icons etc. Free website contents that help to develop,
    build, promote and maintain a web site. Hscripts.com offers a collection of quality webmaster resources
    and tools for web masters and developers. Easy to use, these web tools can really help you build, promote,
    or enhance your web site. Sign up today for our free newsletter to know the hottest resource added.
    Good collection of jquery scripts which are used by thousands of websites around the world.
    Make use of the simple copy and paste codes into your web pages.
    The examples are free to download. Start downloading our free Jquery script
    examples which are commonly used in all web applications. With our expertise and knowledge,
    hscripts are also developing scripts to handle customer needs.
    Contact us at support@hscripts.com for outsourcing script and programs, projects or product development";
  ?>
</span>
<?php
     echo highlight($searchtext, $word);
       ?>
</div>
<?php
        function highlight($searchtext, $word, $case='1')
        {
	    $word = trim($word);
	    $wordsArray = explode(' ', $word);
	    foreach($wordsArray as $words) {
	        if(strlen(trim($words)) != 0)
	        if ($case) {
	            $searchtext = eregi_replace($words, '<font style="background:yellow";>\\0</font>', $searchtext);
	        } else {
	            $searchtext = ereg_replace($words, '<font style="background:yellow";>\\0</font>', $searchtext);
	        }
	     }
	  return $searchtext;
	} 

?>
<div id="dumdiv" align="center" style=" font-size: 10px;color: #dadada;">
    <a id="dum" style="padding-right:0px; text-decoration:none;color: #dadada;text-align:center;" href="http://www.hscripts.com">&copy;h</a>
  </div>
	</body>
</html>

      
   