<?php

    ini_set('display_errors', '1');
    include "../_headers/db_connection.php";
    global $connection;

    $uid = $_POST["uid"];

    // Set user_freeze_flag = True
    $query = "UPDATE user_nodemcu_com SET user_freeze_flag = TRUE ";
    $query .= "WHERE unc_user_unique_id = '".$uid."';";

    $result = mysqli_query( $connection, $query );

    if ( $result ){
        // Check nodemcu_freeze_flag for True
        $query = "SELECT nodemcu_freeze_flag FROM user_nodemcu_com ";
        $query .= "WHERE unc_user_unique_id = '".$uid."';";
        $result = mysqli_query( $connection, $query );

        if( mysqli_num_rows( $result ) > 0 ){
            $result = mysqli_fetch_assoc( $result );
            $result = (int)$result["nodemcu_freeze_flag"];

            // If nodemcu_freeze_flag is True then update user_freeze_flag = False
            if( $result ){
                $query = "UPDATE user_nodemcu_com SET user_freeze_flag = FALSE ";
                $query .= "WHERE unc_user_unique_id = '".$uid."';";

                $result = mysqli_query( $connection, $query );
                if( $result ){
                    // If nodemcu_freeze_flag is True send 400
                    $result = [ "result" => 0 ];
                    echo json_encode( $result );
                } else {
                    http_response_code(500);
                }
            } else {
                // If nodemcu_freeze_flag is False send 200
                $result = [ "result" => 1 ];
                echo json_encode( $result );
            }

        } else {
            http_response_code(500);
        }
    } else {
        http_response_code(500);
    }