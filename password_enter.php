<?php
    ini_set('display_errors', '1');
    include "_headers/functions.php";
    session_start();
    global $connection;

    if ( isset( $_SESSION["token-id"] ) && !empty( $_SESSION["token-id"] ) ){
        header("location:index.php");
    } else {
        cookie_check( $redirect = true );
    }

    if( isset( $_POST["password2"] ) && !empty( $_POST["password2"]  ) &&  isset( $_SESSION["authenticate"] ) && isset( $_SESSION["email-id"] ) && !empty( $_SESSION["authenticate"] ) && !empty( $_SESSION["email-id"] ) ){
        $password = mysqli_escape_string($connection, hash( 'sha256' , $_POST['password2'] ) );

        $query  = "UPDATE user_login SET user_password = '" . $password . "' ";
        $query .= "WHERE user_email_id = '" . $_SESSION["email-id"] . "';";

        $result = mysqli_query( $connection, $query );
        if( !$result ){
            echo "<script> 
                        alert('Failed to update password. \\nPlease try again later.');
                        if( window.history.replaceState ){
                            window.history.replaceState( null, null, location.href='forgot_password.php' );
                        }
                </script>";
        } else {
            echo "<script> 
                        alert('Password has been updated successfully!');
                        if( window.history.replaceState ){
                            window.history.replaceState( null, null, location.href='login.php' );
                        }
                </script>";
        }

    }

    if( isset( $_SESSION["authenticate"] ) && isset( $_SESSION["email-id"] ) && !empty( $_SESSION["authenticate"] ) && !empty( $_SESSION["email-id"] ) ){

?>
        <!DOCTYPE html>
        <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <title>FARMATO</title>
                <meta content="Farmato, Farming Automation sales, Farming Automation india" name="description">
                <meta content="Farmato, Farming Automation sales, Farming Automation india" name="keywords">
                <link href="Assets/Images/logo2.png" rel="icon">
                <link href="Assets/Images/apple-touch-icon.png" rel="apple-touch-icon">
                <link href="Assets/vendor/remixicon/remixicon.css" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
                <link href="Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="Assets/vendor/icofont/icofont.min.css" rel="stylesheet">
                <link href="Assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
                <link href="Assets/vendor/venobox/venobox.css" rel="stylesheet">
                <link href="Assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
                <link href="Assets/vendor/aos/aos.css" rel="stylesheet">
                <link href="Assets/css/style.css" rel="stylesheet">
            </head>

        <body>

            <header id="header" class="fixed-top">
                <div class="container d-flex align-items-center justify-content-between">
                    <h1 class="logo"><a href="index.html">FARM<span>ATO</span></a></h1>
                    <a href="login.html" class="login-btn">Login</a>
                </div>
            </header>

            <div class="log_main">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                                <div class="card card-signin my-5">
                                    <div class="card-body">
                                        
                                        <h5 class='card-title text-center'>Enter New Password</h5>
                                        <form class='form-signin' action='#' method='POST' onSubmit='return checkPassword(this)'>
                                            <div class='form-label-group'>
                                                <input type='password' id='inputPassword' name="password1" class='form-control' placeholder='Password' name='password' included >
                                                <label for='inputPassword'>New Password</label>
                                            </div>
            
                                            <div class='form-label-group'>
                                                <input type='password' id='inputPassword1' name="password2" class='form-control' placeholder='Password' name='conf_password' included >
                                                <label for='inputPassword1'>Confirm Password</label>
                                            </div>
            
                                            <button class='btn btn-lg btn-block text-uppercase' name='reinsert_password' style='background-color: #689F38; color: #fff;' type='submit'>Submit</button>
                                            <hr class='my-4'>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer id="footer">
                    <div class="footer-top">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 col-md-6 footer-links">
                                    <h4>Services</h4>
                                    <ul>
                                        <li><i class="bx bx-wifi-1"></i> <a href="#">Return Policy</a></li>
                                        <li><i class="bx bx-wifi-1"></i> <a href="#">Security</a></li>
                                        <li><i class="bx bx-wifi-1"></i> <a href="#">Term of Use</a></li>
                                        <li><i class="bx bx-wifi-1"></i> <a href="#">Privacy policy</a></li>
                                    </ul>
                                </div>
            
                                <div class="col-lg-3 col-md-6 footer-links">
                                    <h4>About</h4>
                                    <ul>
                                        <li><i class="bx bx-wifi-1"></i> <a href="#">Company</a></li>
                                        <li><i class="bx bx-wifi-1"></i> <a href="#">Team</a></li>
                                    </ul>
                                </div>
            
                                <div class="col-lg-3 col-md-12 footer-links">
                                    <h4>Contact Us</h4>
                                    <ul>
                                        <li><i class="bx bx-wifi-1"></i> <a href="#">Email: test@example.com</a></li>
                                        <li><i class="bx bx-wifi-1"></i> <a href="#">Phone Number: +91 9123456780</a></li>
                                    </ul>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </footer>

            <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
            <div id="preloader"></div>
            <script src="Assets/vendor/jquery/jquery.min.js"></script>
            <script src="Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="Assets/vendor/jquery.easing/jquery.easing.min.js"></script>
            <!-- <script src="Assets/vendor/php-email-form/validate.js"></script> -->
            <script src="Assets/vendor/owl.carousel/owl.carousel.min.js"></script>
            <script src="Assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="Assets/vendor/venobox/venobox.min.js"></script>
            <script src="Assets/vendor/waypoints/jquery.waypoints.min.js"></script>
            <script src="Assets/vendor/counterup/counterup.min.js"></script>
            <script src="Assets/vendor/aos/aos.js"></script>
            <script src="Assets/js/main.js"></script>

            <script type = "text/javascript"> 
                function checkPassword(form) {
                    var password = form.password.value;
                    var conf_password = form.conf_password.value;
                    if (password != conf_password) {
                        alert("PASSWORDS DO NOT MATCH: \nPlease try again...");
                        document.getElementById('inputPassword1').value = ""; 
                        return false;
                    }    
                }
            </script> 
        </body>

        </html>

<?php
    } else {
        header("location:forgot_password.php");
    }
?>


