<?php
    ini_set('display_errors', '1');
    include "../_headers/db_connection.php";
    global $connection;

    // get json output from nodemcu
    $data = json_decode(file_get_contents('php://input'), true);

    $query = "UPDATE user_nodemcu_com SET temperature = ".$data['temperature'];
    $query .= ", humidity = ".$data['humidity'].", soil_moisture = ".$data['soil_moisture'];
    $query .= " WHERE unc_user_unique_id = '".$data['uid']."';";
    // die($query);

    $result = mysqli_query( $connection, $query );

    if ( $result ){
        http_response_code(200);
    } else {
        http_response_code(500);
    }

?>


