<?php
    ini_set('display_errors', '1');
    include "../../_headers/db_connection.php";
    global $connection;

    // get json output from nodemcu
    $data = json_decode(file_get_contents('php://input'), true);

    /*{
        "uid": "ccac34d923330a2968f12e163d5a2cd6",
        "humidity": 100,
        "soil_moisture": 100,
        "temperature": 100,
        "irrigation_on_off_status":1,
        "pump_on_off_status":1
    }*/

    $query = "INSERT INTO sensor_data ( sensor_user_unique_id, soil_moisture, temperature, humidity,";
    $query .= "irrigation_on_off_status, pump_on_off_status ) VALUES ( '".$data["uid"]."', ";
    $query .= $data["soil_moisture"].", ".$data["temperature"].", ".$data["humidity"].", ";
    $query .= $data["irrigation_on_off_status"].", ".$data["pump_on_off_status"]."); ";

    // die($query."");
    $result = mysqli_query( $connection, $query );
    if( !$result ){
        http_response_code(500);
    }

    // '{ "uid": "ccac34d923330a2968f12e163d5a2cd6","humidity": 100.12,"soil_moisture": 100,"temperature": 100.123, "irrigation_on_off_status":1, "pump_on_off_status":1}';
    
