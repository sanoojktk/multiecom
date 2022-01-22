<?php
session_start();
include("model/dboperation.php");
$storeids=$_SESSION['fk_id']; 
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
                            <div class="col"></div>
                            <div class="col">
                                <h3>Orders</h3>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <button type="button"
                                    class="btn btn-outline-primary rounded  btn-sm me-1 mb-1">All</button>
                                <button type="button"
                                    class="btn btn-outline-primary rounded  btn-sm me-1 mb-1">Pending</button>
                                <button type="button"
                                    class="btn btn-outline-primary rounded  btn-sm me-1 mb-1">Accepted</button>
                            </div>
                        </div>
                        <div style="background-color: #d0daeb;">
                            <div class="section-title">All orders
                                <div class="right">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle text-muted" data-bs-toggle="dropdown">
                                            Select
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">LifeTime</a>
                                            <a class="dropdown-item" href="#">This week</a>
                                            <a class="dropdown-item" href="#">Today</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="listview">
<?php
$sqi="SELECT id,order_id,order_date,qty,product_price,product_image,seller_id FROM order_details WHERE seller_id='$storeids' ORDER BY id DESC";

$result = $mysqli->query($sqi);
if (!empty($result) && $result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
?> 
                                <li>
                        <a onclick="document.location='order-detail.php?sa=<?php echo $row['order_id'] ?>'">
                                        <div class="card cart-item">
                                            <div class="card-body">
                                                <div class="in">
                                                    <img src="prod_image/<?php echo $row['product_image'] ?>" alt="product"
                                                        class="imaged w64">
                                                    <div class="text">
                                        <p class="text-muted">Order# :<?php echo $row['order_id'] ?></p>
                                                        <p class="detail"><?php echo $row['qty'] ?> Items</p>
                                         <strong class="price">$ <?php echo $row['product_price'] ?> </strong>
                                                        <p class="detail"><?php echo $row['order_date'] ?></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </li>   
<?php

}
}
?>  
                                                           
                            </ul>


                        </div>
                    </div>
                    <!-- * App Company -->
                </div>

            </div>
            <!-- * App Body -->

        </div>
        <!-- * App Capsule -->

        <!-- App Bottom Menu -->
        <div class="appBottomMenu">
            <a href="dashboard.html" class="item">
                <div class="col">
                    <ion-icon name="home-outline"></ion-icon>
                    <strong>Home</strong>
                </div>
            </a>
            <a href="#" class="item active">
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