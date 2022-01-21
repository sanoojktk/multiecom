<?php
session_start();
include("../model/dboperation.php");

if (!isset($_SESSION['phone'])) {

header('Location: .../seller-login.php');
}
$phone=$_SESSION['phone']; 
$otp = mysqli_real_escape_string($mysqli , $_POST['otp']);

$qry      = "SELECT * FROM seller_login WHERE phone = '$phone' 
                                 AND   otp = '$otp'";	

$result   = $mysqli->query($qry);
$num      = mysqli_num_rows($result);
if ($num == 0) 
{
	header("Location:../login.php?msg=2");
}
else 
{
	if ($row = mysqli_fetch_array($result)) 
	{  

$_SESSION['fk_id'] = $row['fk_id'];

$fid=$_SESSION['fk_id']; 

$qry      =     "SELECT store_name, city FROM seller_register WHERE store_ids = '$fid'";
$result   =      $mysqli->query($qry);
$row      =      mysqli_fetch_array($result,MYSQLI_ASSOC);

$_SESSION['store_name'] = $row['store_name'];

$city = $row['city'];


$qry      =     "SELECT ids FROM city WHERE city_name = '$city'";
$result   =      $mysqli->query($qry);
$row      =      mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['city_id'] =  $row['ids'];


header("Location:../seller-dashboard.php?sa=$fid");
	}
}

?>