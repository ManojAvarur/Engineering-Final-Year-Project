<?php

    ini_set('display_errors', '1');
    include "../_headers/db_connection.php";

    // Get UID from nodemcu
    $uid = $_POST["uid"];
    global $connection;

    $query = "SELECT irrigation_manual_overide_request, sensor_data_request FROM user_nodemcu_com ";
    $query .= "WHERE unc_user_unique_id = ".$uid.";";

    $result = mysqli_query( $connection, $query );

    $row = mysqli_fetch_assoc( $result );

        $result_in_json = [
            // "unc_user_unique_id" => $row['unc_user_unique_id'],
            "irrigation_manual_overide_request" => $row['irrigation_manual_overide_request'],
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
