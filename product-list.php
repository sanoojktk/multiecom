<?php
session_start();

include("model/dboperation.php"); 
@$prod_name      =   $_POST['search_city'];
$_SESSION['city'] =  $prod_name; 
$cityid         =   $_SESSION['cityid']  ; 


/*$status="";
if (isset($_POST['pid']) && $_POST['pid']!=""){
$pids = $_POST['pid'];


$sqi="SELECT * FROM pro_details WHERE prod_id ='$pids'";
$result = $mysqli->query($sqi);
$row = mysqli_fetch_assoc($result);
$name = $row['prod_name'];
$code = $row['prod_id'];
$price = $row['discount_price'];
$image = $row['prod_image'];
$seller_id = $row['seller_ids'];

$cartArray = array(
    $code=>array(
    'name'=>$name,
    'code'=>$code,
    'price'=>$price,
    'quantity'=>1,
    'image'=>$image,
     'sellerid'=>$seller_id)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}
else
{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
        $status = "<div class='box' style='color:red;'>
        Product is already added to your cart!</div>";  

     
    } 
    else
     {
    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
    $status = "<div class='box'>Product is added to your cart!</div>";
    }

    }
}
?>*/

$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($mysqli,"SELECT * FROM pro_details WHERE prod_id ='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['prod_name'];
$code = $row['prod_id'];
$price = $row['discount_price'];
$image = $row['prod_image'];
$seller_id = $row['seller_ids'];

$cartArray = array(
    $code=>array(
    'name'=>$name,
    'code'=>$code,
    'price'=>$price,
    'quantity'=>1,
    'image'=>$image,
     'sellerid'=>$seller_id)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
        $status = "<div class='box' style='color:red;'>
        Product is already added to your cart!</div>";  
    } else {
    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
    $status = "<div class='box'>Product is added to your cart!</div>";
    header("Location:search-product.php");
    }

    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Mobilekit Mobile UI Kit</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 5, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="search-product.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="assets/img/cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>


        </div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" class="full-height">


        <div class="section full mt-2">
            <div class="section-title">Title</div>
            <div class="wide-block pt-2 pb-2">
               <div class="row">

<?php               
/*$sqi = "SELECT * FROM pro_details WHERE prod_name  LIKE '%".$prod_name."%' OR '%".$cityid."%' ";

$result = $mysqli->query($sqi);
if (!empty($result) && $result->num_rows > 0) {
while($row = $result->fetch_assoc()) { 
*/
$result = mysqli_query($mysqli, "SELECT * FROM pro_details
    WHERE  city_id LIKE '%{$cityid}%' AND prod_name LIKE '%{$prod_name}%'");

while ($row = mysqli_fetch_array($result))
{
?>                 
                <div class="col-6">
                    <div class="card product-card">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="card-body">

                            <img src="prod_image/<?php echo $row['prod_image'];?>" class="image" alt="product image">
                            <h2 class="title"><?php echo $row['prod_name'];?></h2>
                            <p class="text"></p>
                            <div class="price"><?php echo $row['price'];?></div>

                            <input type="hidden" name="code" value="<?php echo $row['prod_id'];?>">
                           <button type="submit" class="btn btn-primary">ADD TO CART</button>
                        </div>
                        </form>
                    </div>
                </div>
 <?php
}
mysqli_close($mysqli);
?>           
            </div>
            </div>

        </div>
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="index.html" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        <a href="app-components.html" class="item">
            <div class="col">
                <ion-icon name="cube-outline"></ion-icon>
            </div>
        </a>
        <a href="page-chat.html" class="item">
            <div class="col">
                <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                <span class="badge badge-danger">5</span>
            </div>
        </a>
        <a href="app-pages.html" class="item">
            <div class="col">
                <ion-icon name="layers-outline"></ion-icon>
            </div>
        </a>
        <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
                            <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong>Julian Gruber</strong>
                            <div class="text-muted">
                                <ion-icon name="location"></ion-icon>
                                California
                            </div>
                        </div>
                        <a href="#" class="close-sidebar-button" data-bs-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="index.html" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Discover
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="app-components.html" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="cube-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Components
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="app-pages.html" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="layers-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Pages</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Chat</div>
                                    <span class="badge badge-danger">5</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Dark Mode</div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input dark-mode-switch" type="checkbox"
                                            id="darkmodesidebar">
                                        <label class="form-check-label" for="darkmodesidebar"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="listview-title mt-2 mb-1">
                        <span>Friends</span>
                    </div>
                    <ul class="listview image-listview flush transparent no-line">
                        <li>
                            <a href="page-chat.html" class="item">
                                <img src="assets/img/sample/avatar/avatar7.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Sophie Asveld</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html" class="item">
                                <img src="assets/img/sample/avatar/avatar3.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Sebastian Bennett</div>
                                    <span class="badge badge-danger">6</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html" class="item">
                                <img src="assets/img/sample/avatar/avatar10.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Beth Murphy</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html" class="item">
                                <img src="assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Amelia Cabal</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html" class="item">
                                <img src="assets/img/sample/avatar/avatar5.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Henry Doe</div>
                                </div>
                            </a>
                        </li>
                    </ul>

                </div>

                <!-- sidebar buttons -->
                <div class="sidebar-buttons">
                    <a href="#" class="button">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>
                    <a href="#" class="button">
                        <ion-icon name="archive-outline"></ion-icon>
                    </a>
                    <a href="#" class="button">
                        <ion-icon name="settings-outline"></ion-icon>
                    </a>
                    <a href="#" class="button">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div>
                <!-- * sidebar buttons -->
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

    <!-- ============== Js Files ==============  -->
    <!-- Bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!-- Splide -->
    <script src="assets/js/plugins/splide/splide.min.js"></script>
    <!-- ProgressBar js -->
    <script src="assets/js/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>

</body>



</html>