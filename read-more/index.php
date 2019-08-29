<html>
   <head>
      <title>Read / View More Link Php Script to Display Rest of the Text</title>
      <script type="text/javascript" src="jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="read-more.css" media="screen">
    <script type='text/javascript'>
    $(document).ready(function() {
       $("#loader").hide();
    });
    function readmorequestions()
    {
      var sds = document.getElementById("dum");
            if(sds == null){
            alert("You are using a free package.\n You are not allowed to remove the copyright.\n");
        }
        var sdss = document.getElementById("dumdiv");
        if(sdss == null){
            alert("You are using a free package.\n You are not allowed to remove the copyright.\n");
        }
        if(sdss != null)
        { 
	 $("#loader").show();
	 var id = $('#moreid').val();
	 var limit = $('#limitval').val();
	 $.ajax({
	    url: 'displaymore.php',
	    type: 'POST',
	    data: "id=" +id+ "&limit="+limit,
	    success: function(data)
	    {
	        out=data.split('**$$**');
		$("#loader").hide();
		if(out[0]=="")
		{
		  $("#error").show();
		  $("#simg").hide();
		}
		else{
	        $("#displaymore").append(out[0]);
		}
		$("#moreid").val(out[1]);
	    }
	});
	}
    }
    
    </script>
   </head>
   <body>
  <?php
  include "config.php";
  echo "<div style='font-size: 15px; font-weight: bold; text-align: center;'>Read / View More Link Php Script</div><br>";
   $start=0;
   $limit=2;
   $i=0;
   $cn=mysql_connect($hostname,$username,$password);
if(!$cn)
{
   echo "database not connected";
    
}
else{
    //echo "database selected";
}

$link=mysql_selectdb($dbname,$cn);
if(!$link)
{
    echo "Table not selected";
    
}
else
{
    //echo "table selected";    
}
  $GetContents = mysql_query("SELECT * FROM $tablename limit $start,$limit");
    while($row = mysql_fetch_array($GetContents))
	{
            
		$i++;
		$comment =  $row['comments']; // change your field name here instead of comments
		echo "<table align='center' border='0' id='disptable'><tr>
	       <td align='center'>$comment</td></tr></table><br>";
	    
	}
	echo "<input type='hidden' id='moreid' value='$i'>";
	echo "<input type='hidden' id='limitval' value='$limit'>";
	echo "<div id='displaymore'></div><br>";
	echo "<div align='center'><div id='error' align='center' style='display: none;color:red;'>Sorry No More results</div></div>";
	echo "<div align='center'><img id='loader' src='ajax-loader.gif'></div><br>";
	echo '<div id="simg" align="center" onclick="readmorequestions()" style="cursor: pointer;"><b>Show more</b></div>';
        ?>
<div align='center' style=" padding-top: 25px;font-size: 10px;color: #dadada;" id="dumdiv">
<a href="http://www.hscripts.com" id="dum" style="padding-right:0px; text-decoration:none;color: green;">&copy;h</a></div>

   </body>
</html>