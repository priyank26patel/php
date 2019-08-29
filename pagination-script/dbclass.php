<?php
class DB
{
	function execute($query)
		{
			return mysql_query($query);
		}
	function num_rows($res)
		{
			return mysql_num_rows($res);
		}
	function fetch_array($res)
		{
			return mysql_fetch_array($res);
		}
	function paginate($limit,$page=1,$total_pages,$viewpage)
		{       $adjacents=2;
 			$prev = $page - 1;                            
			$next = $page + 1;                            
			$max_pages = ceil($total_pages/$limit);        
			$lpm1 = $max_pages - 1;         
			$paginate = "";
		if($max_pages > 1)
   		{
          		$paginate .= "<span class=\"paginate\" >";
		if ($page > 1)
			$paginate.= "<a href='$viewpage?page=$prev'>&#171 Prev</a>&nbsp;&nbsp;";
		else
	$paginate.= "<span class='disabled'>&#171 Prev</span>&nbsp;&nbsp;";   
			if ($max_pages < 7 + ($adjacents * 2))
				{   
				for ($counter = 1; $counter <= $max_pages; $counter++)
					{
					if ($counter == $page)
$paginate.= "<span class='current'>$counter</span>&nbsp;&nbsp;";
					else
$paginate.= "<a href='$viewpage?page=$counter'>$counter</a>&nbsp;&nbsp;";                   
					}
				}
			elseif($max_pages > 5 + ($adjacents * 2))
			{
				if($page < 1 + ($adjacents * 2))       
					{
						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
							{
								if ($counter == $page)
$paginate.= "<span class='current'>$counter</span>&nbsp;&nbsp;";
								else
$paginate.= "<a href='$viewpage?page=$counter'>$counter</a>&nbsp;&nbsp;";                   
							}
	$paginate.= "...&nbsp;&nbsp;";
	$paginate.= "<a href='$viewpage?page=$lpm1'>$lpm1</a>&nbsp;&nbsp;";
	$paginate.= "<a href='$viewpage?page=$max_pages'>$max_pages</a>&nbsp;&nbsp;";       
					}
			elseif($max_pages - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
	$paginate.= "<a href='$viewpage?page=1'>1</a>&nbsp;&nbsp;";
	$paginate.= "<a href='$viewpage?page=2'>2</a>&nbsp;&nbsp;";
	$paginate.= "...&nbsp;&nbsp;";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
$paginate.= "<span class='current'>$counter</span>&nbsp;&nbsp;";
						else
$paginate.= "<a href='$viewpage?page=$counter'>$counter</a>&nbsp;&nbsp;";                   
					}
	$paginate.= "...&nbsp;&nbsp;";
	$paginate.= "<a href='$viewpage?page=$lpm1'>$lpm1</a>&nbsp;&nbsp;";
	$paginate.= "<a href='$viewpage?page=$max_pages'>$max_pages</a>&nbsp;&nbsp;";       

			}

	else
	{
	$paginate.= "<a href='$viewpage?page=1'>1</a>&nbsp;&nbsp;";
	$paginate.= "<a href='$viewpage?page=2'>2</a>&nbsp;&nbsp;";
	$paginate.= "...&nbsp;&nbsp;";
		for ($counter = $max_pages - (2 + ($adjacents * 2)); $counter <= $max_pages; $counter++)
			{
				if ($counter == $page)
$paginate.= "<span class='current'>$counter</span>&nbsp;&nbsp;";	
			else
$paginate.= "<a href='$viewpage?page=$counter'>$counter</a>&nbsp;&nbsp;";                   
			}
	}

}
       	if ($page < $counter - 1)
	{
$paginate.= "<a href='$viewpage?page=$next' class=prev>Next &#187</a>&nbsp;&nbsp;";
	}
       	else
	{
           $paginate.= "<span class=\"disabled\">Next &#187</span>&nbsp;&nbsp;";
 	}
		
}
       

		return $paginate;
}
}
?>
	

