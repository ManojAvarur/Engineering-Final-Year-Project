<?php
    ini_set('display_errors', '1');
    include "../../_headers/db_connection.php";
    global $connection;

    // get json output from nodemcu
    $data = json_decode(file_get_contents('php://input'), true);

    $query = "UPDATE user_nodemcu_com SET temperature = ".$data['temperature'];
    $query .= ", humidity = ".$data['humidity'].", soil_moisture = ".$data['soil_moisture'];
    $query .= ", sensor_data_request = FALSE, new_data_recieved_flag = TRUE";
    $query .= " WHERE unc_user_unique_id = '".$data['uid']."';";
    // die($query);

    $result = mysqli_query( $connection, $query );

    if ( $result ){
        http_response_code(200);
    } else {
        http_response_code(500);
    }
    // curl -H "Content-Type: application/json" -X POST -d '{ "uid": "ccac34d923330a2968f12e163d5a2cd6","humidity": 100.12,"soil_moisture": 100,"temperature": 100.123, "irrigation_on_off_status":1, "pump_on_off_status":1}' http://127.0.0.1/farmato/handel_requests/iotrequest/db_unc_update.php

?>

