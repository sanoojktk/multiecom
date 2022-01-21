<?php
session_start();
$seller_id = $_SESSION['fk_id']; 
$city_id   = $_SESSION['city_id'];
$product_code = "p";
$product_code   .= rand(10000,99999);
include("../model/dboperation.php");
$prod_category          = 	mysqli_real_escape_string($mysqli , $_POST['prod_category']);
$prod_name 		        = 	mysqli_real_escape_string($mysqli , $_POST['prod_name']);
$prod_price        		= 	mysqli_real_escape_string($mysqli , $_POST['prod_price']);
$discou_price           =   mysqli_real_escape_string($mysqli , $_POST['discou_price']);
$quantity               =   mysqli_real_escape_string($mysqli , $_POST['quantity']);
$qunit               =   mysqli_real_escape_string($mysqli , $_POST['qunit']);
$description            =   mysqli_real_escape_string($mysqli , $_POST['description']);

if(!empty($_FILES["pro_image"]['tmp_name'])){
$temp1 = explode(".",$_FILES["pro_image"]["name"]);
$newfilename1 = rand(). "_".date('m-d-Y_hia') . '.' .end($temp1);
move_uploaded_file($_FILES['pro_image']['tmp_name'],"../prod_image/".$newfilename1);
$img=$newfilename1;


}


       
$sql		 =   "INSERT INTO pro_details(prod_name,
			                               price,
			                               discount_price,
			                               description,
                                           prod_category,
	                                       prod_image,
	                                       quantity,
	                                       qty_unit,
                                           seller_ids,
                                           city_id,
                                           product_code)
                 VALUES ('$prod_name',
						  '$prod_price',
						 '$discou_price',
             			 '$description',
             			 '$prod_category',
						 '$img',
						 '$quantity',
						 '$qunit',
             			 '$seller_id'
             			 ,'$city_id'
             			 ,'$product_code')";

             //echo $sql;exit;
		if (!mysqli_query($mysqli,$sql)) {
  die('Error: ' . mysqli_error($mysqli));
}

header("Location:../seller-product-details.php");
?>