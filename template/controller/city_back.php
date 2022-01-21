<?php
session_start();
include("../../model/dboperation.php");
$city        = 	mysqli_real_escape_string($mysqli , $_POST['city']);

       
$sql		 =   "INSERT INTO city(city_name)
                   VALUES ('$city')";

if (!mysqli_query($mysqli,$sql)) {
die('Error: ' . mysqli_error($mysqli));
}
header("Location:../city.php");
?>                  