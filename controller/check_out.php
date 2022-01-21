<?php
session_start();
include("../model/dboperation.php");
/*require_once("model/dbcontroller.php");
$db_handle = new DBController();
*/
$order_id = "OD";
$order_id   .= rand(1000000000000,9999999999999);

foreach ($_SESSION["cart_item"] as $item){


$sql		 =   "INSERT INTO order_details(prod_name,
			                               		product_price,
			                               		product_image,
	                                       	qty,
	                                       order_id,
	                                       	product_id,
                                           seller_id,
                                          order_date)

                                  VALUES ('".$item["prod_name"]."',
                                  	      '".$item["discount_price"]."',
                                  	      '".$item["prod_image"]."',
                                          '".$item['quantity']."',
                                          '".$order_id."',
                                          '".$item['prod_id']."',
                                           '".$item['seller_ids']."',
                                           now());"; 

                                           if (!mysqli_query($mysqli,$sql)) {
  die('Error: ' . mysqli_error($mysqli));
}



   } 
/*$sqi   =   "INSERT INTO order_details(prod_name,
                                        product_price,
                                      product_image, */ 
?>