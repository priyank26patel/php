<?php
session_start();
$_SESSION['uid'] = '1';
$_SESSION['username'] = 'yourname';
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
$paypal_id='your_seller_id';  // sriniv_1293527277_biz@inbox.com
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Products | Store</title>
        <style type="text/css">
            body{
                width: 900px;
                margin: 0 auto;
                margin-top: 50px;
                font:bold 14px arial;
            }
            .product{
                float: left;
                margin-right: 10px;
                border: 1px solid #cecece;
                padding: 10px;
                margin-right: 20px;
            }
            .price{
                text-align: right;
            }
            .btn{
                text-align: center;
}
        </style>
    </head>
    <body>
        <h2>Welcome, <?php echo $_SESSION['username'];?></h2>
        <?php
        require 'db_config.php';
        $result = mysql_query("SELECT * from products");
        while($row = mysql_fetch_array($result)) {
            ?>
        <div class="product">            
            <div class="image">
                <img src="images/<?php echo $row['product_img'];?>" alt=""  width="197px" height="210px"/>
            </div>
            <div class="name">
                    <?php echo $row['product'];?>
            </div>
            <div class="price">
                Price: <?php echo $row['price'];?>$
            </div>
            <div class="btn">
                <form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1'>
                    <input type='hidden' name='business' value='<?php echo $paypal_id;?>'>
                    <input type='hidden' name='cmd' value='_xclick'>

                    <input type='hidden' name='item_name' value='<?php echo $row['product'];?>'>
                    <input type='hidden' name='item_number' value='<?php echo $row['pid'];?>'>
                                   <input type='hidden' name='amount' value='<?php echo $row['price'];?>'>

                    <input type='hidden' name='no_shipping' value='1'>
                    <input type='hidden' name='currency_code' value='USD'>
                    <input type='hidden' name='handling' value='0'>
                    <input type='hidden' name='cancel_return' value='http://localhost/paypal/cancel.php'>
                    <input type='hidden' name='return' value='http://localhost/paypal/success.php'>

                    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form> 
            </div>
        </div>

            <?php
        }
        ?>
    </body>
</html>
