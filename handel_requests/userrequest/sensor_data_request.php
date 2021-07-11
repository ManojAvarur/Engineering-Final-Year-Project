<?php

    ini_set('display_errors', '1');
    include "../../_headers/db_connection.php";

    $uid = $_POST["uid"];

    $query = "UPDATE user_nodemcu_com ";
    $query .= "SET sensor_data_request = TRUE, new_data_recieved_flag = FALSE, irrigation_manual_overide_request = FALSE ";
    $query .= "WHERE unc_user_unique_id = '".$uid."';";

    $result = mysqli_query( $connection, $query );

    if( $result ){
        $result = ["result" => 1];
        echo json_encode( $result );
    } else {
        $result = [ "result" => 0 ];
        echo json_encode( $result );
    }