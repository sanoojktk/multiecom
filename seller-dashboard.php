<?php
session_start();
include("model/dboperation.php");
$fid  = $_GET['sa'];
$storeids=$_SESSION['fk_id']; 
$qry      =     "SELECT * FROM seller_register WHERE store_ids = '$fid'";
$result   =      $mysqli->query($qry);
$row      =      mysqli_fetch_array($result,MYSQLI_ASSOC);
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
    <title>TAPBASKET-Best Local Online Marketplace to Shop</title>
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
        <div class="section full" style="padding: 10px;background-color:#dae0e9">
            <div class="section full" style="padding: 10px;">
                <!-- * App Company -->
                <div class="card">
                    <div class="card-body">
                        <div class="section mt-2">
                            <div class="profile-head">
                                <div class="avatar">
                                    <!-- <img src="assets/img/sample/photo/d1.jpg" alt="avatar" class="imaged w64 rounded"> -->
                                    <img src="store_logo/<?php echo $row['store_logo']; ?>" alt="image" class="imaged w64">
                                </div>
                                <div class="in">
                                    <h3 class="name"><?php echo $row['store_name']; ?></h3>
                                    <h5 class="subtext"><?php echo $row['add_ress']; ?></h5>
                                    <h5 class="subtext"><?php echo $row['city']; ?></h5>
                                    <h5 class="subtext"><?php echo $_SESSION['phone']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="divider bg-dark mt-2 mb-3"></div>
                        <h4><b>Share Link on whatsapp</b></h4>
                        <p class="card-text">Your customer can visit your online store and place order form this link
                        </p>
                        <h6>
                            sharemystore.rajugrocery.com
                        </h6>
                          <input type="te" value="http://localhost/multiecom/seller-dashboard.php?sa=<?php echo $storeids; ?>" id="myInput">
                        <button onclick="myFunction()"  class="btn btn-whatsapp btn-sm me-1 mb-1" data-bs-toggle="modal" data-bs-target="#DialogIconedSuccess">
                            <ion-icon name="logo-whatsapp" ></ion-icon>
                            Whatsapp
                        </button>

                        <button onclick="myFunction()" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#DialogIconedSuccess">Copy text</button>
                        <script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */
  
}
</script>
                    </div>
                </div>
                <!-- * App Company -->
                <!-- * App Overview -->
                <div class="section full">
                    <div class="section-title">Overview
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
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <h6>ORDERS</h6>
                                    <h2>340</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <h6>REVENUE</h6>
                                    <h2>$1290</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6>STORE VIEWS</h6>
                                    <h2>2</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6>PRODUCT VIEWS</h6>
                                    <h2>32</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- * App Overview -->
                <!-- * App Active Orders -->
                <div class="section full">
                    <div class="section-title">Active Orders
                        <div class="right">
                            <a href="#" class="comment-button text-muted">
                                View All
                                <span>
                                    <ion-icon name="chevron-forward-outline"></ion-icon>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <button type="button"
                                        class="btn btn-outline-primary rounded  btn-sm me-1 mb-1">All</button>
                                    <button type="button"
                                        class="btn btn-outline-primary rounded  btn-sm me-1 mb-1">Pending</button>
                                    <button type="button"
                                        class="btn btn-outline-primary rounded  btn-sm me-1 mb-1">Accepted</button>
                                </div>
                                <ul class="listview image-listview">
                                    <li>
                                        <div class="card cart-item mb-2">
                                            <div class="card-body">
                                                <div class="in">
                                                    <img src="assets/img/sample/photo/product1.jpg" alt="product"
                                                        class="imaged">
                                                    <div class="text">
                                                        <h3 class="title">Order # :985353</h3>
                                                        <p class="detail">1 item</p>
                                                        <p class="detail">$3</p>
                                                        <p class="detail">17/12/2021,09:11 PM</p>
                                                    </div>
                                                </div>
                                                <div class="cart-item-footer">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div><a href="#"
                                                                    class="btn btn-outline-secondary btn-sm">Decline</a>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div><a href="#"
                                                                    class="btn btn-outline-secondary btn-sm">Accept</a>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- * App Active Orders -->
            </div>

        </div>
        <!-- * App Body -->

    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="#" class="item active">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="newspaper-outline"></ion-icon>
                <strong>Orders</strong>
            </div>
        </a>
        <a href="seller-product-add.php" class="item">
            <div class="col">
                <ion-icon name="archive-outline"></ion-icon>
                <strong>Product</strong>
            </div>
        </a>
        <a href="categories.php" class="item">
            <div class="col">
                <ion-icon name="copy-outline"></ion-icon>
                <strong>Categories</strong>
            </div>
        </a>
        <a href="#" class="item">
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