<?php
session_start();


require_once("model/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    case "add":
        if(!empty($_POST["quantity"])) {
            $productByid = $db_handle->runQuery("SELECT * FROM pro_details WHERE prod_id='" . $_GET["id"] . "'");
    $itemArray = array($productByid[0]["prod_id"]=>array('prod_name'=>$productByid[0]["prod_name"], 
         'prod_id'=>$productByid[0]["prod_id"],
         'quantity'=>$productByid[0]["quantity"],
         'qty_unit'=>$productByid[0]["qty_unit"],  
         'discount_price'=>$productByid[0]["discount_price"],
         'seller_ids'=>$productByid[0]["seller_ids"], 
         'prod_image'=>$productByid[0]["prod_image"]));


            
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByid[0]["prod_id"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByid[0]["prod_id"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;

              
            }
        }
    break;
    case "remove":
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"]  AS $k => $v){
                
                if($_GET["id"] == $_SESSION["cart_item"][$k]['prod_id']) 
                       //echo $k;exit;
                        unset($_SESSION["cart_item"][$k]); 
                                 
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
            }
        }
    break;
    case "empty":
        unset($_SESSION["cart_item"]);
    break;  
}
}
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="carts.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
    <form action="controller/check_out.php" method="post">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Image</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["discount_price"];
		?>
				<tr>
                    <td><?php echo $item["prod_name"]; ?> <input type="hidden" name="seller_ids" value="<?php echo $item["seller_ids"]; ?>"></td>
				<td><img src="prod_image/<?php echo $item["prod_image"]; ?>" width="100" height="100" class="cart-item-image"/></td>
				
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["discount_price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="carts.php?action=remove&id=<?php echo $item["prod_id"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["discount_price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total: <input type="hidden" name="total_price" value="<?php echo $total_price; ?>"></td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
<tr>
    <td><input type="submit" name="checkout"></td>
</tr>
</form>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>
</body>
</html>