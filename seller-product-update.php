<?php
session_start();

include("model/dboperation.php"); 
$seller_id = $_SESSION['fk_id'];
if (!isset($_SESSION['phone'])) {

header('Location: seller-login.php');
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
    <link rel="manifest" href="__manifest.json">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
 <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Product Deatils</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->

    <div id="appCapsule">

        <div class="login-form">
            <div class="section">
           
                <h4>Enter product details</h4>
            </div>
<?php
$id=$_GET['sa'];
$sqi="SELECT *  FROM pro_details WHERE prod_id='$id'";
$result = $mysqli->query($sqi);
$row=mysqli_fetch_assoc($result); 
?>           
            <div class="section mt-2 mb-5">
                <form action="controller/seller_pro_back.php" method="post" enctype="multipart/form-data">

 <div class="form-group boxed">
                        <div class="input-wrapper">
                <input type="text" name="prod_name" value="<?php echo $row['prod_name'];?>" class="form-control" id="name1" placeholder="Product Name" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" name="prod_category" value="<?php echo $row['prod_category'];?>" class="form-control" id="name1" placeholder="Product Category">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>


                    
                     <div class="form-group boxed">
                        <div class="input-wrapper">
                 <input type="text" name="prod_price" value="<?php echo $row['price'];?>"  class="form-control" id="name1" placeholder="Price" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                               <div class="form-group boxed">
                        <div class="input-wrapper">
             <input type="text" name="discou_price" value="<?php echo $row['discount_price'];?>" class="form-control" id="name1" placeholder="Discount Price" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            
                            <textarea class="form-control" name="description" placeholder="Description"><?php echo $row['description'];?></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>


 <div class="form-group boxed">
                        <div class="input-wrapper">
                            
                           <img src="prod_image/<?php echo $row['prod_image'];?>" alt="image" class="imaged w64">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

       <div class="custom-file-upload" id="fileUpload1">
                        <input type="file" id="fileuploadInput" name="pro_image" accept=".png, .jpg, .jpeg">
                        <label for="fileuploadInput">
                            <span>
                                <strong>
                                    <ion-icon name="cloud-upload-outline"></ion-icon>
                                    <i>Tap to Upload image</i>
                                </strong>
                            </span>
                        </label>
                    </div>                   


                   

                    <div class="form-button-group">
                        <input type="hidden" name="id" value="<?php echo $row['prod_id'];?>">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
                    </div>

                </form>
            </div>
           
        </div>



    </div>
    <!-- * App Capsule -->



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