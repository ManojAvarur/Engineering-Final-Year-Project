<?php
    ini_set('display_errors', '1');
    session_start();
    include "_headers/db_connection.php";
    include "_headers/functions.php";

    if( isset( $_SESSION["token-id"] ) && isset( $_SESSION["user_name"] ) && !empty( $_SESSION["token-id"] ) && !empty( $_SESSION["user_name"] ) ){

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
        <link href="Assets/vendor/toggle-switch/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <link href="Assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center justify-content-between">
                <h1 class="logo"><a href="index.html">FARM<span>ATO</span></a></h1>
                <nav class="nav-bar d-none d-lg-block">
                    <ul>
                        <li><a href="#information_main_home">Home</a></li>
                        <li><a href="#sensor-datass">Sensor Data</a></li> 
                        <li><a href="#graph">Graph</a></li>
                        <li><a href="#footer">About Us</a></li>  
                    </ul>
                </nav>
                <nav class="nav-bar d-lg-none d-sm-block">
                    <ul>
                        <li class="drop-down">
                            <a></a>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Sensor Data</a></li> 
                                <li><a href="#">Graph</a></li>
                                <li><a href="#">About Us</a></li>    
                            </ul>
                        </li>
                    </ul>
                </nav>
                <a href="logout.php" class="login-btn">Log Out</a>
            </div>
        </header>

        <section id="information_main_home" class="d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="col-xl-6 col-lg-8">
                        <script type="text/javascript">
                            document.write("<h1>");
                            var username = "<?= $_SESSION["user_name"] ?>"
                            var day = new Date();
                            var hr = day.getHours();
                            if (hr >= 0 && hr < 12) {
                                document.write("Good Morning <br>"+username+"<span>!</span>");
                            } else if (hr >= 12 && hr <= 17) {
                                document.write("Good Afternoon <br>"+username+"<span>!</span>");
                            } else {
                                document.write("Good Evening <br>"+username+"<span>!</span>");
                            }
                            document.write("</h1>");
                        </script>
                    </div>
                </div>
            </div>
        </section>

        <section class="sensor-datas" id="sensor-datass" >
            <div class="container" data-aos="fade-down">
                <div class="section-title">
                    <h2>Sensor</h2>
                    <p>Sensor Data</p>
                </div>
             
                <div class="alert" id="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>Error! : </strong> NodeMCU is under execution. Please try after some time!
                </div> 

                <div class="pump-box" id="pump">
                    <p>
                        <h4><strong>Pump Status : </strong> </h4>
                        <input class="btn-success" type="checkbox" checked data-toggle="toggle" data-width="100" >
                    </p>
                </div> 

                <div class="row">

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <i class="icofont-thermometer icon"></i>
                            <h4><a href="javascript:void(0);" onclick="display_alert()">Temprature</a></h4>
                            <h4>34&nbsp;&#8451</h4>
                            <p>It's a measure of how fast the atoms and molecules of a substance are moving.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <i class="icofont-ui-weather icon"></i>
                            <h4><a href="javascript:void(0);" onclick="display_alert()">Humidity</a></h4>
                            <h4>20%</h4>
                            <p>Humidity is the amount of water vapor present in air.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 d-flex align-items-stretch">
                        <div class="icon-box">
                            <i class='bx bx-water icon'></i>
                            <h4><a href="javascript:void(0);" onclick="display_alert()">Moisture</a></h4>
                            <h4>30%</h4>
                            <p>Soil moisture is the amount of water in the active layer of the soil</p>
                        </div>
                    </div>

                </div>
    
            </div>
        </section>

        <section class="graphs" id="graph">
            <div class="container" data-aos="fade-down">
                <div class="section-title">
                    <h2>Graph</h2>
                    <p>Graph Representation</p>
                </div>

                <div class="chart-row">
                    <div class="col-lg-12 ">
                        <div id="curve_chart" class="chart"></div> 
                    </div>
                    <div class="col-lg-12 ">
                        <div id="chart_div1" class="chart"></div>
                    </div>
                    <div class="col-lg-12 ">
                        <div id="table_div" class="chart" style="height: 0;"></div>
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
        <!-- <script src="Assets/vendor/php-email-form/validate.js"></script> -->
        <script src="Assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="Assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="Assets/vendor/venobox/venobox.min.js"></script>
        <script src="Assets/vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="Assets/vendor/counterup/counterup.min.js"></script>
        <script src="Assets/vendor/aos/aos.js"></script>
        <script src="Assets/js/main.js"></script>
        <script src="Assets/vendor/toggle-switch/js/bootstrap4-toggle.min.js"></script>
        <script src="Assets/vendor/google-charts/loader.js"></script>
        <script src="Assets/js/information.js"></script>
    </body>
</html>

<?php
    } else {
        header("location:login.php");
    }
?>