<?php
    ini_set('display_errors', '1');
    session_start();
    include "_headers/db_connection.php";
    include "_headers/functions.php";
    $span_check = false;  

    if ( isset( $_SESSION["token-id"] ) && !empty( $_SESSION["token-id"] ) ){
        header("location:index.php");
    } else {
        cookie_check( 'index.php' ,$redirect = true );
    }

    if ( isset( $_POST["email-id"] ) && isset( $_POST["password"] ) && isset($_POST['submit']) && !empty( $_POST["email-id"] ) ) {

        global $connection;

        $username = mysqli_escape_string( $connection, $_POST['email-id'] );                        
        $password = mysqli_escape_string( $connection, hash('sha256', $_POST['password'] ) );

        $query = "SELECT user_unique_id , user_full_name FROM user_login ";
        $query .= "WHERE user_email_id = '".$username."' AND user_password = '".$password."'";

        $result = mysqli_query( $connection, $query );
        
        if( mysqli_num_rows( $result ) > 0 ){
            
            $result = mysqli_fetch_assoc( $result );
            $_SESSION["token-id"] = $result["user_unique_id"];
            $_SESSION["user_name"] = $result["user_full_name"];

            if( isset( $_POST["remember-me"] ) ){
                $cookie_value = generate_cookie_token( $_POST['email-id'], $result["user_unique_id"] );
                $expire = time() + 91 * 24 * 60 * 60;
                setcookie("token_id_1", $cookie_value[0], $expire, "/"); //Setting Cookie
                setcookie("token_id_2", $cookie_value[1], $expire, "/"); //Setting Cookie

                $query = "SELECT cookie_user_unique_id FROM cookie_data ";
                $query .= "WHERE cookie_user_unique_id = '" . $result["user_unique_id"] . "'; ";

                $result = mysqli_query( $connection, $query );

                if( mysqli_num_rows( $result ) <= 0 ){   
                    $query = "INSERT INTO cookie_data VALUES ";
                    $query .= "( '".$_SESSION["token-id"]."', '".$cookie_value[0]."', '".$cookie_value[1]."' );";

                    $result = mysqli_query( $connection, $query );
                    if( !$result ){
                        echo "<script> alert('You can\'t be remembered'); </script>";
                    }
                }
            }

            echo "<script> 
                    if( window.history.replaceState ){
                        window.history.replaceState( null, null, location.href='index.php' );
                    }
                </script>";

        } else {
            $span_check = true;               
        }

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
                <h1 class="logo"><a href="index.php">FARM<span>ATO</span></a></h1>
                <a href="index.php" class="login-btn">Home</a>
            </div>
        </header>
    

        <div class="log_main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">Sign In</h5>

                                <?php
                                    if( $span_check  ){
                                ?>
                                        <h6 class="text-center" style="color: red;"><strong>Incorrect Username (or) Password</strong></h6>
                                        <br>
                                <?php
                                    }
                                ?>

                                <form class="form-signin" action="login.php" method="post">
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" name="email-id" class="form-control" placeholder="Email address" required autofocus>
                                        <label for="inputEmail">Email address</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <input type="checkbox" id="rememberMe" name="remember-me" style="margin-left: 3%;"><label for="rememberMe" style="padding-left: 2%; padding-bottom: 3%;">Remember me</label>
                                    <a href="forgot_password.php" class="forgot_pass">Forgot Password?</a>
                                    <button name="submit" class="btn btn-lg btn-block text-uppercase" style="background-color: #689F38; color: #fff;" type="submit">Log in</button>
                                    <!-- <p style="padding-top: 3%; text-align: right; margin-right: 2%;">New User? <span><a href="signup.php">Sign Up</a></span></p> -->
                                    <hr class="my-4">
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
                                <li><i class="bx bx-wifi-1"></i> <a href="mailto:farmato.dontreply@gmail.com">Via Email</a></li>
                                <li><i class="bx bx-wifi-1"></i> <a href="tel:+919123456780">Via Phone Call</a></li>
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
    </body>

</html>