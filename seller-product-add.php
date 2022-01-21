<?php
session_start();
$seller_id=$_SESSION['fk_id']; 
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
                                <h3>Product</h3>
                            </div>
                            <div class="col" style="text-align: right;"><button type="button"
                                    class="btn btn-icon btn-sm btn-primary me-1 mb-1" data-bs-toggle="modal"
                                    data-bs-target="#ModalForm">
                                    <ion-icon name="add-outline"></ion-icon>
                                </button></div>

                        </div>
                        <!-- Search Component -->
                        <div class="row">
                            <form class="search-form">
                                <div class="form-group searchbox">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <i class="input-icon">
                                        <ion-icon name="search-outline"></ion-icon>
                                    </i>
                                </div>
                            </form>
                        </div>
                        <!-- Search Component -->
                    </div>

                    <!-- Modal Form-Add Product -->
                    <div class="modal fade modalbox" id="ModalForm" data-bs-backdrop="static" tabindex="-1"
                        role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Product</h5>
                                    <a href="#" data-bs-dismiss="modal">Close</a>
                                </div>
                                <div class="modal-body">
                                    <div class="login-form">
                                        <div class="section mt-4 mb-5">
                                            <form action="controller/seller-product_back.php" method="post" enctype="multipart/form-data">
                                                
                                                    <div class="custom-file-upload" id="fileUpload1">
                             <input type="file" id="fileuploadInput"
                                                            accept=".png, .jpg, .jpeg" name="pro_image">
                                                        <label for="fileuploadInput">
                                                            <span>
                                                                <strong>
                                                                    <ion-icon name="cloud-upload-outline">
                                                                    </ion-icon>
                                                                    <i>Tap to Upload</i>
                                                                </strong>
                                                            </span>
                                                        </label>
                                                    </div>
                                               
                                                <div class="form-group basic mt-5">
                                                    <div class="input-wrapper">
                                                        <label class="form-label" for="name">Product
                                                            Name</label>
                                                        <input type="input" name="prod_name" class="form-control" id="name"
                                                            placeholder="Enter your Product Name">
                                                        <i class="clear-input">
                                                            <ion-icon name="close-circle"></ion-icon>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="form-group basic">
                                                    <div class="input-wrapper">
                                                        <label class="form-label" for="email1">MRP Price</label>
                                                        <input type="input" name="prod_price" class="form-control" id="email1"
                                                            placeholder="₹ **">
                                                        <i class="clear-input">
                                                            <ion-icon name="close-circle"></ion-icon>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="form-group basic">
                                                    <div class="input-wrapper">
                                                        <label class="form-label" for="discount">Discount
                                                            Price</label>
                                                        <input type="input" name="discou_price" class="form-control" id="discount"
                                                            placeholder="Enter your Discount Price">
                                                        <i class="clear-input">
                                                            <ion-icon name="close-circle"></ion-icon>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="form-group basic">
                                                    <div class="input-wrapper">
                                                        <label class="form-label"
                                                            for="city5">Quantity</label>
                                                           
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="input" name="quantity" class="form-control" id="name"placeholder="Enter Quantity">
                                                                    <i class="clear-input">
                                                                    <ion-icon name="close-circle"></ion-icon>
                                                                    </i>
                                                                </div>
                                                                <div class="col">
                                                                    <select class="form-control form-select" id="city5" name="qunit">
                                                                        <option>Quantity Unit</option>
                                                                        <option value="Piece">piece</option>
                                                                        <option value="Kg">kg</option>
                                                                        <option value="Gm">gm</option>
                                                                        <option value="Liter">liter</option>
                                                                        <option value="Ml">ml</option>
                                                                        <option value="Dozen">dozen</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="form-group basic">
                                                    <div class="input-wrapper">
                                                        <label class="form-label" for="city5">Category</label>
                                                        <select class="form-control form-select" id="city5" name="prod_category">
                                                            <option value="0">Select Category</option>
                                                            <option value="1">Category1</option>
                                                            <option value="2">Category2</option>
                                                            <option value="3">Category3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group basic">
                                                    <div class="input-wrapper">
                                                        <label class="form-label" for="description">Description</label>
                                                        <textarea id="description" name="description" rows="2"
                                                            class="form-control"></textarea>
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
                    <!-- * Modal Form-Add product -->
                    <div class="card-body" style="padding: 10px;">
                        <ul class="listview image-listview media mb-2">
                            <li>
<?php
$sqi="SELECT prod_id, prod_name, prod_image,price FROM pro_details WHERE seller_ids='$seller_id' ORDER BY prod_id  DESC";
$result = $mysqli->query($sqi);
if (!empty($result) && $result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?> 
                                <div class="item">
                                    <div class="imageWrapper" data-bs-toggle="modal" data-bs-target="#EditProductModal">
                                        <img src="prod_image/<?php echo $row['prod_image'];?>" alt="image" class="imaged w64">
                                    </div>
                                    <div class="in" data-bs-toggle="modal" data-bs-target="#EditProductModal">
                                        <div>
                                           <?php echo $row['prod_name'];?>
                                            <div class="text-muted"><?php echo $row['price'];?></div>
                                        </div>

                                    </div>
                                    <div>
                                        <a data-bs-toggle="modal" data-bs-target="#DialogIconedButtonInline"
                                            class="text-muted">
                                            <div class="col">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </div>
                                        </a>
                                    </div>

                                </div>
<?php
}
}
?>                                 
                                <div class="modal fade dialogbox" id="DialogIconedButtonInline"
                                    data-bs-backdrop="static" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Product</h5>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete the product?
                                            </div>
                                            <div class="modal-footer">
                                                <div class="btn-inline">
                                                    <a href="#" class="btn btn-text-danger" data-bs-dismiss="modal">
                                                        <ion-icon name="trash-outline"></ion-icon>
                                                        DELETE
                                                    </a>
                                                    <a href="#" class="btn btn-text-secondary"
                                                        data-bs-dismiss="modal">CANCEL</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Form-Edit Product -->
                                <div class="modal fade modalbox" id="EditProductModal" data-bs-backdrop="static"
                                    tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Product</h5>
                                                <a href="#" data-bs-dismiss="modal">Close</a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="login-form">
                                                    <!-- <div class="section mt-2">
                                                        
                                                    </div> -->
                                                    <div class="section mt-4 mb-5">
                                                        <form>
                                                            <div class="form-check form-switch"
                                                                style="text-align: right;">
                                                                <div class="text-muted">Listed Status</div>
                                                                <!-- </div> -->
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="SwitchCheckDefault4" checked />
                                                                <label class="form-check-label"
                                                                    for="SwitchCheckDefault4"></label>
                                                                <!-- <div> -->

                                                            </div>
                                                            <div class="form-group basic mt-5">
                                                                <div class="input-wrapper">
                                                                    <label class="form-label" for="name">Product
                                                                        Name</label>
                                                                    <input type="input" class="form-control" id="name"
                                                                        placeholder="Enter your Product Name">
                                                                    <i class="clear-input">
                                                                        <ion-icon name="close-circle"></ion-icon>
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="form-group basic">
                                                                <div class="input-wrapper">
                                                                    <label class="form-label" for="email1">MRP Price</label>
                                                                    <input type="input" class="form-control" id="email1"
                                                                        placeholder="₹ **">
                                                                    <i class="clear-input">
                                                                        <ion-icon name="close-circle"></ion-icon>
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="form-group basic">
                                                                <div class="input-wrapper">
                                                                    <label class="form-label" for="discount">Discount
                                                                        Price</label>
                                                                    <input type="input" class="form-control"
                                                                        id="discount"
                                                                        placeholder="Enter your Discount Price">
                                                                    <i class="clear-input">
                                                                        <ion-icon name="close-circle"></ion-icon>
                                                                    </i>
                                                                </div>
                                                            </div>
                                                <div class="form-group basic">
                                                    <div class="input-wrapper">
                                                        <label class="form-label"
                                                            for="city5">Quantity</label>
                                                           
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="input" class="form-control" id="name"placeholder="Enter Quantity">
                                                                    <i class="clear-input">
                                                                    <ion-icon name="close-circle"></ion-icon>
                                                                    </i>
                                                                </div>
                                                                <div class="col">
                                                                    <select class="form-control form-select" id="city5">
                                                                        <option value="0">Quantity Unit</option>
                                                                        <option value="1">piece</option>
                                                                        <option value="2">kg</option>
                                                                        <option value="3">gm</option>
                                                                        <option value="3">liter</option>
                                                                        <option value="3">ml</option>
                                                                        <option value="3">dozen</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="form-group basic">
                                                    <div class="input-wrapper">
                                                        <label class="form-label"
                                                            for="city5">Category</label>
                                                        <select class="form-control form-select" id="city5">
                                                            <option >Select Category</option>
<?php
$sql="SELECT * FROM cate_gory WHERE seller_ids='$seller_id'";
$result = $mysqli->query($sql);
if (!empty($result) && $result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>                                                            
                                    <option value="<?php echo $row['prod_category'];?>"><?php echo $row['prod_category'];?></option>
 <?php
 }
 }
 ?>                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group basic">
                                                    <div class="input-wrapper">
                                                        <label class="form-label"
                                                            for="description">Description</label>
                                                        <textarea id="description" rows="2"
                                                            class="form-control"></textarea>
                                                        <i class="clear-input">
                                                            <ion-icon name="close-circle"></ion-icon>
                                                        </i>
                                                    </div>
                                                </div>
                                                <form>
                                                    <div class="custom-file-upload" id="fileUpload1">
                                                        <input type="file" id="fileuploadInput"
                                                            accept=".png, .jpg, .jpeg">
                                                        <label for="fileuploadInput">
                                                            <span>
                                                                <strong>
                                                                    <ion-icon name="cloud-upload-outline">
                                                                    </ion-icon>
                                                                    <i>Tap to Upload</i>
                                                                </strong>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </form>

                                                <div class="mt-2">
                                                    <button type="button"
                                                        class="btn btn-primary btn-block btn-lg"
                                                        data-bs-dismiss="modal">Save</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- * Modal Form-Edit Product -->
                </li>
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
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="newspaper-outline"></ion-icon>
                <strong>Orders</strong>
            </div>
        </a>
        <a href="#" class="item active">
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