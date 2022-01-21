<!doctype html>
<html lang="en">



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

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
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
            <a href="seller-login.php" class="headerButton">
                Login
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="login-form">
            <div class="section">
                <h1>Register</h1>
                <h4>Fill the form to join us</h4>
            </div>
            <div class="section mt-2 mb-5">
                <form action="controller/seller_register_back.php" method="post" enctype="multipart/form-data">

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" name="store_name" class="form-control" id="name1" placeholder="Store Name">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            
                            <textarea class="form-control" name="address" placeholder="Enter Your Store Address"></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
 <div class="form-group boxed">
                        <div class="input-wrapper">
                           
                        <input type="text" name="city" id="search_city" placeholder="City" class="form-control">  
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" name="phone" class="form-control" id="name1" placeholder="Enter Your Phone Number" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" id="password1" name="upi_id" autocomplete="off" placeholder="Payment Upi ID">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

           <div class="custom-file-upload" id="fileUpload1">
                        <input type="file" id="fileuploadInput" name="store_logo" accept=".png, .jpg, .jpeg">
                        <label for="fileuploadInput">
                            <span>
                                <strong>
                                    <ion-icon name="cloud-upload-outline"></ion-icon>
                                    <i>Tap to Upload Store Logo</i>
                                </strong>
                            </span>
                        </label>
                    </div>

                    <div class=" mt-1 text-start">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheckb1">
                            <label class="form-check-label" for="customCheckb1">I Agree <a href="#">Terms &
                                    Conditions</a></label>
                        </div>

                    </div>

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
                    </div>

                </form>
            </div>
        </div>



    </div>
    <!-- * App Capsule -->


<script type="text/javascript">
  $(function() {
     $( "#search_city" ).autocomplete({
       source: 'city_get_ajax.php',
     });
  });
</script>
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