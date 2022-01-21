<?php
session_start();
include("../../model/dboperation.php");


$user_name = mysqli_real_escape_string($mysqli , $_POST['user_name']);
$pass_word = mysqli_real_escape_string($mysqli , $_POST['pass_word']);

$qry      = "SELECT * FROM sub_admin WHERE 	user_name = '$user_name' 
                                 AND   pass_word = '$pass_word'";	
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
		  $_SESSION['user_name'] = $row['user_name'];


header("Location:../store.php?sa=$fid");
	}
}

?>