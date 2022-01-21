<?php
session_start();

include("../model/dboperation.php"); 


$prod_category        =     mysqli_real_escape_string($mysqli , $_POST['prod_category']);
$prod_name              =   mysqli_real_escape_string($mysqli , $_POST['prod_name']);
$prod_price             =   mysqli_real_escape_string($mysqli , $_POST['prod_price']);
$discou_price          =   mysqli_real_escape_string($mysqli , $_POST['discou_price']);
$description          =   mysqli_real_escape_string($mysqli , $_POST['description']);
$ids                =   mysqli_real_escape_string($mysqli , $_POST['id']);
if(!empty($_FILES["pro_image"]['tmp_name'])){
$temp1 = explode(".",$_FILES["pro_image"]["name"]);
$newfilename1 = rand(). "_".date('m-d-Y_hia') . '.' .end($temp1);
move_uploaded_file($_FILES['pro_image']['tmp_name'],"../prod_image/".$newfilename1);
$img=$newfilename1;



$sql            = "UPDATE pro_details SET
prod_name       =   '$prod_name',
price           =   '$prod_price',
discount_price  =   '$discou_price',
description     =   '$description',
prod_category   =   '$prod_category',
prod_image      =  '$img' WHERE prod_id='$ids'";
 
 
        if (!mysqli_query($mysqli,$sql)) {
  die('Error: ' . mysqli_error($mysqli));
}


}

else

{

$sql            = "UPDATE pro_details SET
prod_name       =   '$prod_name',
price           =   '$prod_price',
discount_price  =   '$discou_price',
description     =   '$description',
prod_category   =   '$prod_category' prod_id='$ids'";
 
        if (!mysqli_query($mysqli,$sql)) {
  die('Error: ' . mysqli_error($mysqli));
}


}
header("location:../product-select.php");
?>

