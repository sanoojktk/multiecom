<?php
include("../model/dboperation.php");
$id=$_GET['dete'];
$sql	=	"DELETE FROM pro_details WHERE prod_id=$id";
if (mysqli_query($mysqli, $sql)) {
   header("location:../product-select.php");
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}

?>