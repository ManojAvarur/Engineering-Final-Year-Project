<?php
    ini_set('display_errors', '1');
    include "_headers/functions.php";
    session_start();

    if ( !isset( $_SESSION["token-id"] ) && !empty( $_SESSION["token-id"] ) ){
        cookie_check();
    }
    
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
                <nav class="nav-bar d-none d-lg-block">
                    <ul>
                        <li><a href="#main_home">Home</a></li>
                        <li><a href="#goals">Goals</a></li> 
                        <li><a href="#developer">Developer's</a></li>
                        <li><a href="#footer">About Us</a></li>  
                    </ul>
                </nav>
                <nav class="nav-bar d-lg-none d-sm-block">
                    <ul>
                        <li class="drop-down">
                            <a></a>
                            <ul>
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="#goals">Goals</a></li> 
                                <li><a href="#developer">Developer's</a></li>
                                <li><a href="#footer">About Us</a></li>  
                            </ul>
                        </li>
                    </ul>
                </nav>
                <?php
                    if( isset( $_SESSION["token-id"] ) && !empty( $_SESSION["token-id"] ) ){
                        echo '<a href="logout.php" class="login-btn">Logout</a>';
                    } else {
                        echo '<a href="login.php" class="login-btn">Log In</a>';
                    }
                ?>
            </div>
        </header>
    
        <section id="main_home" class="d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="col-xl-6 col-lg-8">
                        <?php
                            if( isset( $_SESSION["user_name"] ) ) {
                                echo "<h1>Namaskar " . $_SESSION["user_name"] . "<span>.</span></h1>";
                            } else {
                                echo "<h1>Namaskar<span>.</span></h1>";
                            }
                        ?>
                        <h2>Sowing love, <span>Feeding Million</span></h2>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="offers">
            <div class="container">
                <div class="owl-carousel offers-carousel">
                    <img style="border-radius: 10%;" src="Assets/Images/vineyard.jpeg" alt="">
                    <img style="border-radius: 10%;" src="Assets/Images/water-1.jpeg" alt="">
                    <img style="border-radius: 10%;" src="Assets/Images/water-2.jpeg" alt="">
                    <img style="border-radius: 10%;" src="Assets/Images/greenforce-mid.jpeg" alt="">
                    <img style="border-radius: 10%;" src="Assets/Images/jed-owen-ajZibDGpPew-unsplash.jpeg" alt="">
                </div>
            </div>
        </section>
    
        <section class="amart_features" id="goals">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Who are we?</h2>
                    <p>Goals</p>
                </div>
                <div class="row">
                    <div class="image col-lg-6" style='background-image: url("Assets/Images/sunflower.jpeg"); border-radius: 10px;' data-aos="fade-left"></div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="50">
                        <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="100">
                            <i class="ri-earth-line"></i>
                            <h4>Connected</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                        </div>
                        <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="100">
                            <i class="bx bx-receipt"></i>
                            <h4>Automated</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                        </div>
                        <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="100">
                            <i class="bx bx-cube-alt"></i>
                            <h4>Efficient</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
    
            </div>
        </section>
    
        <section class="developers" id="developer">
            <div class="container" data-aos="fade-down">
                <div class="section-title">
                    <h2>Devolopers</h2>
                    <p>Developer Details</p>
                </div>
    
                <div class="row">

                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <div class="icon"></div>
                            <h4><a href="">Abhirup Kulkarni</a></h4>
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <div class="icon"></div>
                            <h4><a href="">Amit Kumar</a></h4>
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch" style="margin-top: 15px;">
                        <div class="icon-box">
                            <div class="icon"></div>
                            <h4><a href="">Keerthana Ravikumar</a></h4>
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch" style="margin-top: 15px;">
                        <div class="icon-box">
                            <div class="icon"></div>
                            <h4><a href="">Manoj A M</a></h4>
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div>

                </div>
    
            </div>
        </section>
    
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
    </body>
</html>