<?php

    ini_set('display_errors', '1');
    include "../_headers/db_connection.php";

    $uid = $_POST["uid"];
    global $connection;

    $query = "UPDATE user_nodemcu_com SET user_freeze_flag = TRUE ";
    $query .= "WHERE unc_user_unique_id = ".$uid."';";

    $result = mysqli_query( $connection, $query );

    if ( $result ){
        $query = "UPDATE user_nodemcu_com SET nodemcu_freeze_flag = FALSE ";
        $query .= "WHERE unc_user_unique_id = ".$uid."';";

        $result = mysqli_query( $connection, $query );

        if( !$result ){
            http_response_code(500);
        } 
    }
    else {
        http_response_code(500);
    }   
    
?>