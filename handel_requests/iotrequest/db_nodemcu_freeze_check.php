<?php

    ini_set('display_errors', '1');
    include "../_headers/db_connection.php";
    global $connection;

    $uid = $_POST["uid"];

    $query = "SELECT nodemcu_freeze_flag FROM user_nodemcu_com ";
    $query .= "WHERE unc_user_unique_id = '".$uid."';";
    
    $result = mysqli_query( $connection, $query );

    if( mysqli_num_rows( $result ) > 0 ){
        $result = mysqli_fetch_assoc( $result );
        $result = [ "result"=> $result["nodemcu_freeze_flag"] ];
        http_response_code(200);
        echo json_encode( $result );
    } else {
        http_response_code(500);
    }
