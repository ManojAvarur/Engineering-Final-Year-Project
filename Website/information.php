<?php
    ini_set('display_errors', '1');
    session_start();
    include "_headers/db_connection.php";
    include "_headers/functions.php";
    global $connection;

    if( isset( $_SESSION["token-id"] ) && isset( $_SESSION["user_name"] ) && !empty( $_SESSION["token-id"] ) && !empty( $_SESSION["user_name"] ) ){

        $pump_on_off_count = [];
        for( $i = 0; $i <= 7; $i++ ){
            $query = "SELECT COUNT(*), time_stamp  FROM sensor_data WHERE sensor_user_unique_id = '".$_SESSION["token-id"]."' AND pump_on_off_status = True and time_stamp >= DATE_ADD(CURDATE(),INTERVAL -($i+1) DAY) and time_stamp < DATE_ADD(CURDATE(),INTERVAL -($i) DAY)" ;
            $result = mysqli_query( $connection, $query);
            array_push( $pump_on_off_count, mysqli_fetch_array( $result ) );
        }

        $irrigation_on_off_count = [];
        for( $i = 0; $i <= 7; $i++ ){
            $query = "SELECT COUNT(*), time_stamp  FROM sensor_data WHERE sensor_user_unique_id = '".$_SESSION["token-id"]."' AND irrigation_on_off_status  = True and time_stamp >= DATE_ADD(CURDATE(),INTERVAL -($i+1) DAY) and time_stamp < DATE_ADD(CURDATE(),INTERVAL -($i) DAY)" ;
            $result = mysqli_query( $connection, $query);
            array_push( $irrigation_on_off_count, mysqli_fetch_array( $result ) );
        }
        
        $humidity_and_temparature = [];
        for( $i = 0; $i <= 7; $i++ ){
            $query = "SELECT AVG(humidity), AVG(temperature), time_stamp  FROM sensor_data WHERE sensor_user_unique_id = '".$_SESSION["token-id"]."' AND time_stamp >= DATE_ADD(CURDATE(),INTERVAL -($i+1) DAY) and time_stamp < DATE_ADD(CURDATE(),INTERVAL -($i) DAY)";
            $result = mysqli_query( $connection, $query);
            array_push( $humidity_and_temparature, mysqli_fetch_array( $result ) );
        }

        
        // $query = "SELECT * FROM sensor_data WHERE sensor_user_unique_id = '".$_SESSION["token-id"]."' ORDER BY time_stamp DESC LIMIT ;";
        // $table_data  = mysqli_fetch_array( mysqli_query( $connection, $query) );

        // echo json_encode($table_data);
        // die("<br>".$query);
        

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
        <link href="Assets/vendor/toggle-switch/css/manual-toggle.css" rel="stylesheet">
        <!-- <link href="Assets/vendor/toggle-switch/css/bootstrap4-toggle.min.css" rel="stylesheet"> -->
        <link href="Assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center justify-content-between">
                <h1 class="logo"><a href="index.php">FARM<span>ATO</span></a></h1>
                <nav class="nav-bar d-none d-lg-block">
                    <ul>
                        <li><a href="#information_main_home">Home</a></li>
                        <li><a href="#sensor-datass">Sensor Data</a></li> 
                        <li><a href="#graph">Graph</a></li>
                        <li><a href="#footer">About Us</a></li>  
                        <li class="unfreeze" style="display: none;"><a>|</a></li>  
                        <li class="unfreeze" style="display: none;"><a href="javascript:void(0);">Un-Freeze NodeMCU</a></li>  
                    </ul>
                </nav>
                <nav class="nav-bar d-lg-none d-sm-block">
                    <ul>
                        <li class="drop-down">
                            <a></a>
                            <ul>
                                <li><a href="#information_main_home">Home</a></li>
                                <li><a href="#sensor-datass">Sensor Data</a></li> 
                                <li><a href="#graph">Graph</a></li>
                                <li><a href="#footer">About Us</a></li>  
                                <li class="unfreeze" style="display: none;"><a href="javascript:void(0);">Un-Freeze NodeMCU</a></li>    
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
                    <strong>Error! : </strong><span id="alert-msg"></span>
                </div> 

                <div class="pump-box" id="pump">
                    <p>
                        <h4><strong>Irrigation Status : </strong><span id="pump-status">OFF</span></h4>
                        <!-- <input class="btn-success" type="checkbox" checked data-toggle="toggle" data-width="100" > -->
                    </p>
                </div> 

                <!-- <div class="pump-box" id="pump">
                    <p>
                        <h4 class="irrigation_manual_overide"><strong>Irrigation Manual Overide : </strong> </h4>
                        <input class="btn-success irrigation_manual_overide" id="switch" onchange="irrigation_manual_overide()" type="checkbox" data-toggle="toggle" data-width="100" >
                    </p>
                </div>  -->

                <div class="pump-box" id="pump">
                    <p>
                        <h4><strong>Irrigation Manual Overide : </strong> </h4>
                        
                            <label class="switch">
                                <input type="checkbox" id="togBtn" onclick="nodemcu_free_check(irrigation_manual_overide, true, 'irrigation')">
                                <div class="slider round" id="togBtn-slider">
                                    <!--ADDED HTML -->
                                    <span class="on">ON</span>
                                    <span class="off">OFF</span>
                                    <!--END-->
                                </div>
                            </label>
                        
                        </p>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <i class="icofont-thermometer icon"></i>
                            <h4><a class="temparature sensor_data_retrival" href="javascript:void(0);" onclick="nodemcu_free_check( request_sensor_data, true, 'request_sensor_data' )">Temprature</a></h4>
                            <h4><a class="temparature sensor_data_retrival sensor_data_display" href="javascript:void(0);" onclick="nodemcu_free_check( request_sensor_data, true, 'request_sensor_data' )">34&nbsp;&#8451</a></h4>
                            <p>It's a measure of how fast the atoms and molecules of a substance are moving.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <i class="icofont-ui-weather icon"></i>
                            <h4><a class="humidity sensor_data_retrival" href="javascript:void(0);" onclick="nodemcu_free_check( request_sensor_data, true, 'request_sensor_data' )">Humidity</a></h4>
                            <h4><a class="humidity sensor_data_retrival sensor_data_display" href="javascript:void(0);" onclick="nodemcu_free_check( request_sensor_data, true, 'request_sensor_data' )">20%</a></h4>
                            <p>Humidity is the amount of water vapor present in air.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 d-flex align-items-stretch">
                        <div class="icon-box">
                            <i class='bx bx-water icon'></i>
                            <h4><a class="moisture sensor_data_retrival" href="javascript:void(0);" onclick="nodemcu_free_check( request_sensor_data, true, 'request_sensor_data' )">Moisture</a></h4>
                            <h4><a class="moisture sensor_data_retrival sensor_data_display" href="javascript:void(0);" onclick="nodemcu_free_check( request_sensor_data, true, 'request_sensor_data' )">30%</a></h4>
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
                    <!-- <div class="col-lg-12 ">
                        <div id="table_div" class="chart" style="height: 0;"></div>
                    </div> -->
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
        <!-- <script src="Assets/vendor/toggle-switch/js/bootstrap4-toggle.min.js"></script> -->
        <script src="Assets/vendor/google-charts/loader.js"></script>  
        <script src="Assets/js/information.js"></script>
        <!-- <script type="text/javascript">
            document.querySelector("#switch").addEventListener("click", function(event) {
                event.preventDefault();
            }, false);
        </script> -->
        <script>
            function line_graph_data(){
                var data =  <?= json_encode( $humidity_and_temparature ) ?> ;
                var formated_data = [
                    ['Day', 'Humidity', 'Temparature']
                ];

                // round( floatval( ) ) parseFloat() 
                for(var i=0; i < data.length; i++ ){
                    var date = new Date(data[i]["time_stamp"]);
                    var day = date.getDate();
                    var month = date.getMonth();
                    var year = date.getFullYear();
                    formated_data.push(  
                        [
                            day+"-"+month+"-"+year,
                            Math.round( parseFloat( data[i]["AVG(humidity)"] ), 2 ),
                            Math.round( parseFloat( data[i]["AVG(temperature)"] ), 2 )
                        ]
                    );
                }

                // for(var i=0; i < formated_data.length; i++ ){
                //     console.log( formated_data[i] );
                // }

                return formated_data;
                // return [
                //     ['Date', 'Humidity', 'Temparature'],
                //     ['Monday',  1000,      400],
                //     ['Tuesday',  1170,      460],
                //     ['Wednesday',  660,       1120],
                //     ['Thursday',  1030,      540],
                //     ['Friday',  340,       780],
                //     ['Saturday',  600,       1000],
                //     ['Sunday',  1430,       530],
                // ];
                
            }
             
            function bar_graph_data(){
                var pump_data =  <?= json_encode( $pump_on_off_count ) ?>;
                var irrigation_data =  <?= json_encode( $irrigation_on_off_count ) ?>;
                var formated_data = [
                    ['Date', 'Pump', 'Irrigation']
                ];
                for(var i=0; i < pump_data.length; i++ ){
                    var date = new Date(pump_data[i]["time_stamp"]);
                    var day = date.getDate();
                    var month = date.getMonth();
                    var year = date.getFullYear();
                    formated_data.push(  
                        [
                            day+"-"+month+"-"+year,
                            parseInt(pump_data[i]["COUNT(*)"]),
                            parseInt(irrigation_data[i]["COUNT(*)"])
                        ]
                    );
                }
                return formated_data;

                // return [
                //     ['Date', 'Pump', 'Irrigation'],
                //     ['2004',  1000,      400],
                //     ['2005',  1170,      460],
                //     ['2006',  660,       1120],
                //     ['2007',  1030,      540]
                // ];
            }

            function table_data(){
                return [
                    ['Mike',  {v: 1, f: '$10,00'}, true],
                    ['Jim',   {v: 1,   f: '$8,000'},  false],
                    ['Alice', {v: 1, f: '$12,500'}, true],
                    ['Bob',   {v: 7,  f: '$7,000'},  true]
                ];
                // return [
                //     ['Mike',  {v: 10000, f: '$10,000'}, true],
                //     ['Jim',   {v:8000,   f: '$8,000'},  false],
                //     ['Alice', {v: 12500, f: '$12,500'}, true],
                //     ['Bob',   {v: 7000,  f: '$7,000'},  true]
                // ];
            }
            function user_id(){
                return "<?= $_SESSION["token-id"] ?>";
            }
        </script>
        <script src="Assets/js/google-charts.js"></script>
    </body>
</html>

<?php
    } else {
        header("location:login.php");
    }
?>