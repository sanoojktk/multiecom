<?php
session_start();
$seller_id = $_SESSION['fk_id']; 
include("../model/dboperation.php");
$prod_category          = 	mysqli_real_escape_string($mysqli , $_POST['prod_category']);

$sql		 =   "INSERT INTO cate_gory(prod_category,
                                         seller_id)

                   VALUES ('$prod_category',
                   	       '$seller_id')";
		if (!mysqli_query($mysqli,$sql)) {
  die('Error: ' . mysqli_error($mysqli));
}
header("Location:../categories.php");                   
?>