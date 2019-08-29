<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
    <input type="text" name="data[]">
    <input type="text" name="data[]">
    <input type="text" name="data[]">
    <input type="text" name="data[]">
    <input type="text" name="data[]">      
    <input type="submit" name="subval" value="Submit" />
</form>
<br />
Output
<br />
<?php
    if(isset($_POST['subval']))
    {
        $diffArr = array();
        foreach($_POST['data'] as $k=>$val)
        {
            if($k>0)
            {
                if($_POST['data'][$k]=='')
                {
                    $missing = $k;
                }

                if($_POST['data'][$k]!='' && $_POST['data'][$k-1]!='')
                {
                    $diffArr[] = $_POST['data'][$k]-$_POST['data'][$k-1];
                }  
            }
            else
            {
                $missing = 0;
            }

        }
        
        echo count(array_unique($diffArr))."<br />";
        echo "missing block : ".$missing."  (Start from 0)<br />";
        if ((count(array_unique($diffArr)) == 1 && count($diffArr)>1) || count($diffArr)==1)
        {
            if($missing==0)
            {
                $finalVal =  $_POST['data'][$missing+1]-$diffArr[0]."<br />"; 
            }
            else
            {
                $finalVal =  $_POST['data'][$missing-1]+$diffArr[0]."<br />"; 
            }
        }
        else
        {
            $finalVal = "Insert proper values";
        }
        echo "output value : ".$finalVal;
        echo "<pre>";
        print_r($_POST);
        print_r($diffArr);
    }
?>