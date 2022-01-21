<?php
session_start();

 /* foreach ($_SESSION["cart_item"] as $key => $value) {
          print $key . '<br>';
        print $value;
         }

*/
        //echo("{$_SESSION['cart_item']}"."<br />");

         foreach($_SESSION['cart_item'] AS $product){
   echo $product['prod_id'] ;
   echo"<br>";
}
?>