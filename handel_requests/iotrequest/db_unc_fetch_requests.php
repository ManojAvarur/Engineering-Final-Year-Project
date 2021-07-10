<?php

    ini_set('display_errors', '1');
    include "../_headers/db_connection.php";

    // Get UID from nodemcu
    $uid = $_POST["uid"];
    global $connection;

    $query = "SELECT irrigation_manual_overide_request, sensor_data_request ";
    $query .= "FROM user_nodemcu_com ";
    $query .= "WHERE unc_user_unique_id = '" . $uid . "';";

    $result = mysqli_query( $connection, $query );
    
    if( mysqli_num_rows( $result ) > 0 ){
        $result = mysqli_fetch_assoc( $result );
        $result = [
            "irrigation_manual_overide_request" => $result['irrigation_manual_overide_request'],
            "sensor_data_request" => $result['sensor_data_request']
        ];
        echo json_encode( $result );
    } else {
        http_response_code(500);
    }
