<?php
$productId = 14234234;
if(!file_get_contents("http://localhost/ob_ecommerce_product_master/web/app_dev.php/api/v1/product?product_ids=$productId&culture=en_us")) {
	$productDataDetail = "Error";
}
else {
	$jsonProductDataDetail = file_get_contents("http://localhost/ob_ecommerce_product_master/web/app_dev.php/api/v1/product?product_ids=$productId&culture=en_us");
	$productDataDetail = json_decode($jsonProductDataDetail,true);
}

	echo "<pre>";
	print_r($productDataDetail);
	echo "</pre>";

?>

