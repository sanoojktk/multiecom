<?php
session_start();
include("model/dboperation.php");
$storeids=$_SESSION['fk_id']; 
$order_id=$_GET['sa'];
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
    <link rel="manifest" href="__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="appCapsule" class="full-height" style="background-color:#dae0e9">

        <!-- App Header -->
        <div class="appHeader bg-primary text-light">
            <div class="left">
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </div>
            <div class="pageTitle">TAPBASKET</div>
            <div class="right">
                <a href="policy.html" class="headerButton">
                    <ion-icon name="information-circle-outline"></ion-icon>
                </a>
            </div>
        </div>
        <!-- * App Header -->
        <!-- * App Body -->
        <div class="section full">
            <div class="section full" style="padding: 10px;">
                <!-- * App Company -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                            <div class="col" style="text-align: center;">
                                <h3>Order Details</h3>
                            </div>

                        </div>
                    </div>
                    <div>
                        <div class="section full">
                            <div class="invoice">
                                <div class="invoice-page-header">
                                    <div class="invoice-id">09-01-2022:04,55 PM</div>
                                </div>
                                <div class="invoice-page-header">
                                    <div class="invoice-id">Order#:$E4734039</div>
                                </div>
                                <div class="invoice-page-header">
                                    <div class="invoice-id">10 ITEMS</div>
                                </div>

                                <div class="invoice-detail mt-4">
                                    <ul class="listview">

                                    <?php
$sqi="SELECT * FROM order_details WHERE order_id ='$order_id' ORDER BY id DESC";

$result = $mysqli->query($sqi);
if (!empty($result) && $result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
?>                                  
                                        <li>
                                            <div class="cart-item">
                                                <div class="in">
                                                    <img src="prod_image/<?php echo $row['product_image'] ?>" alt="product"
                                                        class="imaged">
                                                    <div class="text">
                                                        <h3 class="title"><?php echo $row['prod_name'] ?></h3>
                                                        <p class="detail"> <?php echo $row['qty'] ?></p>
                                                        <div>
                                                        <?php echo $row['qty'] ?> * <strong class="price">$
                                                        <?php echo $row['product_price'] ?></strong>
                                                        </div>
                                                    </div>
                                                   
                                                </div>

                                                <div class="cart-item-footer">
                                                    <div class="text-muted">Item Total : <span class="hightext"><?php echo $row['product_price'] ?>
                                                    <?php $total_price = $row['product_price'];?>
                                                </span>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1" checked />
                                                        <label class="form-check-label" for="SwitchCheckDefault1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
<?php
}
}
?>                                        
                                       
                                    </ul>
                                </div>

                                <div class="invoice-total mt-4">
                                    <ul class="listview transparent simple-listview">
                                        <li>Order total <span class="hightext">$<?php echo $total_price;?></span></li>
                                        <li>Delivery Fee<span class="hightext">$70.00</span></li>
                                        <li>Grand Total<span class="totaltext text-primary">
<?php  
$total_price += 70;
echo $total_price;
?>  
                                    
                                    </span></li>
                                    </ul>
                                </div>

                                <div class="invoice-person mt-4">
                                    <div class="invoice-to">
                                        <h4><b>CUSTOMER DETAILS</b></h4>
                                        <h4>Buyer Name</h4>
                                        <p>user@domain.com</p>
                                        <p>Address</p>
                                        <p>City</p>
                                        <p>Mobile No</p>
                                    </div>

                                </div>
                                <!-- <div class="row mt-2">
                                    <div class="col" style="text-align: center;">
                                        <div><a href="#" class="btn btn-danger me-1 mb-1">DECLINE</a>
                                        </div>
                                    </div>
                                    <div class="col" style="text-align: center;">
                                        <div><a href="#" class="btn btn-success me-1 mb-1">ACCEPT</a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="mt-2">
                                    <button type="button" class="btn btn-primary btn-block btn-lg"
                                        data-bs-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- * App Company -->
            </div>
        </div>
        <!-- * App Body -->


        <!-- App Bottom Menu -->
        <div class="appBottomMenu">
            <a href="dashboard.html" class="item">
                <div class="col">
                    <ion-icon name="home-outline"></ion-icon>
                    <strong>Home</strong>
                </div>
            </a>
            <a href="orders.html" class="item">
                <div class="col">
                    <ion-icon name="newspaper-outline"></ion-icon>
                    <strong>Orders</strong>
                </div>
            </a>
            <a href="product.html" class="item">
                <div class="col">
                    <ion-icon name="archive-outline"></ion-icon>
                    <strong>Product</strong>
                </div>
            </a>
            <a href="categories.html" class="item">
                <div class="col">
                    <ion-icon name="copy-outline"></ion-icon>
                    <strong>Categories</strong>
                </div>
            </a>
            <a href="account.html" class="item">
                <div class="col">
                    <ion-icon name="people-outline"></ion-icon>
                    <strong>Account</strong>
                </div>
            </a>
        </div>
        <!-- * App Bottom Menu -->

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