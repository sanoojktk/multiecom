<?php
session_start();
include("../model/dboperation.php");

if (!isset($_SESSION['phone'])) {

header('Location: .../user-login.php');
}
$phone=$_SESSION['phone']; 


$otp = mysqli_real_escape_string($mysqli , $_POST['otp']);

$qry      = "SELECT * FROM user_register WHERE phone = '$phone' 
                                 AND   otp = '$otp'";	

$result   = $mysqli->query($qry);
$num      = mysqli_num_rows($result);
if ($num == 0) 
{
	header("Location:../login.php?msg=2");
}
else 
{
	

	if($row = mysqli_fetch_array($result)) 
	{  

$_SESSION['user_name'] = $row['user_name'];
	header("Location:../index.php");

	}

}
?>