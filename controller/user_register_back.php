<?php
include("../model/dboperation.php");
$user_name       	  = 	mysqli_real_escape_string($mysqli , $_POST['name']);
$phone              =   mysqli_real_escape_string($mysqli , $_POST['phone']);
$email              =   mysqli_real_escape_string($mysqli , $_POST['email']);
$address 		        = 	mysqli_real_escape_string($mysqli , $_POST['address']);
$city               =   mysqli_real_escape_string($mysqli , $_POST['city']);
$pinnumber          =   mysqli_real_escape_string($mysqli , $_POST['pinnumber']);
$date               =   date("Y-m-d");


$query = "SELECT phone FROM user_register WHERE phone='$phone'";
$result = $mysqli->query($query);
$num      = mysqli_num_rows($result);
          
      if($num  > 0){
           
           echo "Phone Number all ready exit ";
   die;
        }
       
$sql		 =   "INSERT INTO user_register(user_name,
                                  phone,
                                  email,
											            address,
                                  city,
											            pin_number,
                                  dates)
                 VALUES ('$user_name',
						           '$phone',
                       '$email',
                       '$address',
                       '$city',
						           '$pinnumber',
                       '$date')";

             //echo $sql;exit;
		if (!mysqli_query($mysqli,$sql)) {
  die('Error: ' . mysqli_error($mysqli));
}
  $fk_id = $mysqli ->insert_id; 

$sql		=    "INSERT INTO seller_login(phone,
										          fk_id)

				   VALUES ('$phone',
				           '$fk_id')";
   if (!mysqli_query($mysqli,$sql)) {
  die('Error: ' . mysqli_error($mysqli));				           	

}

/*
$msg="
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Untitled Document</title>
</head>

<body>
<table width='500' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='192' align='left' valign='top'>Your registration  successfully completed please click the link veryfiy your email id.</td>
    <td width='25' align='left' valign='top'>:</td>
    <td width='283' align='left' valign='top'>$name</td>
  </tr>

  
    
</table>
</body>
</html>";

$subject = "New registration";
$from = $email;
$headers  = "From: $from\r\n"; 
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
mail($email,$subject,$msg,$headers);
*/
$fields = array(
    "sender_id" => "TXTIND",
    "message" => "$store_name .  successfully registered",
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
     "authorization: pq9JLN4CtLiUV1wXyMK2HvIQ14Vud3OlQkJSULOaI0dwKFMUpJyXw0kRv8IO",
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
 header("location:../confirm-user-register.php");
}


?>