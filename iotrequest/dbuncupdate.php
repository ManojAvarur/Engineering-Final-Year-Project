<?php

    ini_set('display_errors', '1');
    session_start();
    include "../_headers/db_connection.php";
    include "../_headers/functions.php";

    // get json output from nodemcu

    $data = [
        "uid" => 'ccac34d923330a2968f12e163d5a2cd6', 
        "soil_moisture" => 45.9,
        "temperature" => 38.5,
        "humidity" => 80
    ];

    // $data = json_decode(file_get_contents('php://input'), true);

    $query = "UPDATE user_nodemcu_com SET temperature = ".$data['temperature'];
    $query .= ", humidity = ".$data['humidity'].", soil_moisture = ".$data['soil_moisture'];
    $query .= " WHERE unc_user_unique_id = '".$data['uid']."';";
    // die($query);

    $result = mysqli_query( $connection, $query );

    if ( $result )
        echo "Update Successful";
    else    
        echo "Update Failure";






?>


