<?php
    ini_set('display_errors', '1');
    include "../../_headers/db_connection.php";
    global $connection;

    $uid = $_POST["uid"];

    $query = "SELECT temperature, humidity, soil_moisture, new_data_recieved_flag ";
    $query .= "FROM user_nodemcu_com WHERE unc_user_unique_id = '".$uid."'"; 

    $result = mysqli_query( $connection, $query );
    if( mysqli_num_rows( $result ) > 0 ){
        $result = mysqli_fetch_assoc( $result );
        echo json_encode( $result );
    } else {
        http_response_code(500);
    }
?>
