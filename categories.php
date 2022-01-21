<?php
session_start();
$seller_id = $_SESSION['fk_id']; 
include("model/dboperation.php");
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
                                <h3>Categories</h3>
                            </div>
                            <div class="col" style="text-align: right;"><button type="button"
                                    class="btn btn-icon btn-sm btn-primary me-1 mb-1" data-bs-toggle="modal"
                                    data-bs-target="#AddCategoryForm">
                                    <ion-icon name="add-outline"></ion-icon>
                                </button></div>

                        </div>
                    </div>
                    <!-- Modal Form-Add Category -->
                    <div class="modal fade modalbox" id="AddCategoryForm" data-bs-backdrop="static" tabindex="-1"
                        role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Category</h5>
                                    <a href="#" data-bs-dismiss="modal">Close</a>
                                </div>
                                <div class="modal-body">
                                    <div class="login-form">
                                        <div class="section mt-4 mb-5">
                                            <form action="controller/seller_categori-back.php" method="post">
                                                <div class="form-group basic">
                                                    <div class="input-wrapper">
                                                        <label class="form-label" for="cName">Category Name</label>
                                                        <input type="input" name="prod_category" class="form-control" id="cName"
                                                            placeholder="Enter your Category Name">
                                                        <i class="clear-input">
                                                            <ion-icon name="close-circle"></ion-icon>
                                                        </i>
                                                    </div>
                                                </div>


                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary btn-block btn-lg"
                                                        data-bs-dismiss="modal">Save</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- * Modal Form-Add Categoty-->
                    <div class="card-body" style="padding: 10px;">
                        <ul class="listview link-listview">
<?php
$sqi="SELECT ids, prod_category  FROM cate_gory WHERE seller_id='$seller_id' ORDER BY ids DESC";
$result = $mysqli->query($sqi);
if (!empty($result) && $result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>                             
                            <li>
                                <a data-bs-toggle="modal"  class="item">
                               
                                    <div><?php echo $row['prod_category'];?></div>

                                </a>
                            </li>
<?php
}
}
?>                   

                        </ul>

                    </div>
                    <!-- Modal Form-Edit Category -->
                    <div class="modal fade modalbox" id="EditCategoryForm" data-bs-backdrop="static" tabindex="-1"
                        role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Category</h5>
                                    <a href="#" data-bs-dismiss="modal">Close</a>
                                </div>
                                <div class="modal-body">
                                    <div class="login-form">
                                        <div class="section mt-4 mb-5">
                                            <form>
                                                <div class="form-group basic">
                                                    <div class="input-wrapper">
                                                        <label class="form-label" for="cName">Category Name</label>
                                                        <input type="input" class="form-control" id="cName"
                                                            placeholder="Enter your Category Name">
                                                        <i class="clear-input">
                                                            <ion-icon name="close-circle"></ion-icon>
                                                        </i>
                                                    </div>
                                                </div>


                                                <div class="mt-2">
                                                    <button type="button" class="btn btn-primary btn-block btn-lg"
                                                        data-bs-dismiss="modal">Save</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- * Modal Form-Edit Category -->
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
        <a href="#" class="item">
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
        <a href="#" class="item active">
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