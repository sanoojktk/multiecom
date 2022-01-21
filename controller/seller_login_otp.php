<?php
session_start();
include("../model/dboperation.php");
$phone 	= mysqli_real_escape_string($mysqli , $_POST['phone']); 
$otp    = rand(10000,99999);

$query  = "SELECT phone FROM seller_login WHERE phone='$phone'";
$result = $mysqli->query($query);
$num    = mysqli_num_rows($result);
        
if($num == 0){
           
       header("location:../seller-login.php?pho=2");
   die;
        }

$sql		    =	"UPDATE seller_login SET
otp			=	'$otp' WHERE phone='$phone'";
 if (!mysqli_query($mysqli,$sql)) {
  die('Error: ' . mysqli_error($mysqli));
}

$_SESSION['phone'] = $phone;

$fields = array(
     "sender_id" => "TXTIND",
    "message" => "Your login otp is . $otp",
    "variables_values" => "12345|asdaswdx",
     "route" => "v3",
    "numbers" => $phone,
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: o1QLicrhLJAVhHBWLYBislfDkqw2c6lWDwHvo140JWXXLBjc5oTCtAh2pIqe",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
header("location:../seller-otp.php");
}


?>