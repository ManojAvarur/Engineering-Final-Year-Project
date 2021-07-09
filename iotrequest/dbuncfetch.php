<?php

    ini_set('display_errors', '1');
    session_start();
    include "../_headers/db_connection.php";
    // include "../_headers/functions.php";

    // Get UID from nodemcu
    $uid = 'ccac34d923330a2968f12e163d5a2cd6';
    global $connection;

    $query = "SELECT * FROM user_nodemcu_com ";
    $query .= "WHERE unc_user_unique_id = ".$uid.";";

    $result = mysqli_query( $connection, $query );

    $row = mysqli_fetch_assoc( $result );

        $result_in_json = [
            // "unc_user_unique_id" => $row['unc_user_unique_id'],
            "pump_manual_overide_request" => $row['pump_manual_overide_request'],
            "sensor_data_request" => $row['sensor_data_request']
        ];
    
    echo json_encode( $result_in_json );

    $query = "UPDATE user_nodemcu_com SET data_recieved_flag = TRUE ";
    $query .= "WHERE unc_user_unique_id = ".$uid.";";

    $result = mysqli_query( $connection, $query );

    // if( $result )
    //     echo "Webiste waiting for values from nodemcu";
    
    // else
    //     echo "Error occured";


?>