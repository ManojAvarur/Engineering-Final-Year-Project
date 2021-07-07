<?php
    ini_set('display_errors', '1');
    include "_headers/functions.php";
    session_start();
    $span_check = false;

    if ( isset( $_SESSION["token-id"] ) && !empty( $_SESSION["token-id"] ) ){
        header("location:index.php");
    } else {
        cookie_check( $redirect = true );
    }

    if( isset( $_POST["passcode"] ) && isset( $_SESSION["authenticate"] )  && isset( $_SESSION["email-id"] ) && !empty( $_SESSION["authenticate"] ) && !empty( $_SESSION["email-id"] ) ){
        if( $_SESSION["authenticate"]  == $_POST["passcode"] ){
            $_SESSION["authenticate"] = true;
            header("location:password_enter.php");
        } else {
            $span_check = true;
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
                <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
                                        <h5 class='card-title text-center'>Email Verification!</h5>
                                        <p style='margin-top: -8%;padding-bottom: 5%;text-align: center;'>Check your mail "<strong><?= $_SESSION["email-id"] ?></strong>" for activation passcode</p>
                                        <?php
                                            if( $span_check ){
                                        ?>
                                            <h6 class='text-center' style='color: red;'><strong>Incorrect passcode! Please try it again </strong> </h6>
                                        <?php
                                            }
                                        ?>
                                        <form class='form-signin' action='authenticate.php' method='post'>
                                            <div class='form-label-group'>
                                                <input type='text' name='passcode' id='inputEmail' class='form-control' placeholder='Email address' included autofocus>
                                                <label for='inputEmail'>Enter the Passcode</label>
                                            </div>

                                            <button class='btn btn-lg btn-block text-uppercase' style='background-color: #689F38; color: #fff;' name='ver_submit' type='submit'>Submit</button>
                                            <p style='padding-top: 3%; text-align: right; margin-right: 2%;'>Didn't receive a mail? 
                                                <span>
                                                    <a href='' id='linkRef'></a>
                                                </span>
                                            </p>
                                            <p style='padding-top: 3%; text-align: right; margin-right: 2%;'>Incorrect Mail?
                                                <span>
                                                    <a href='forgot_password.html' id='mailReset'>Click Here</a>
                                                </span>
                                            </p>
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
            <script src="Assets/vendor/php-email-form/validate.js"></script>
            <script src="Assets/vendor/owl.carousel/owl.carousel.min.js"></script>
            <script src="Assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="Assets/vendor/venobox/venobox.min.js"></script>
            <script src="Assets/vendor/waypoints/jquery.waypoints.min.js"></script>
            <script src="Assets/vendor/counterup/counterup.min.js"></script>
            <script src="Assets/vendor/aos/aos.js"></script>
            <script src="Assets/js/main.js"></script>

            <script type = "text/javascript"> 

                var timerSec = 30; 
                var myvar;
                var counter = timerSec;
                var Link = document.getElementById("linkRef");
                link_disable(Link);

                function link_disable(link){
                    link.href = "javascript:void(0)";
                    link.classList.add("disabled-link");
                    link.onclick = null;
                    myvar = setInterval(myTimer, 1000);
                }

                function myTimer() {
                    Link.innerHTML = " Try After : "+counter+"s";
                    
                    counter = counter - 1;

                    if(counter < 0){
                        clearInterval(myvar);
                        counter = timerSec;
                        Link.href = "resend_mail.php";   
                        Link.innerHTML = " Try Again";
                        Link.classList.remove("disabled-link");
                        Link.onclick = () => link_disable(Link);
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


