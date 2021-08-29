<?php
    ini_set('display_errors', '1');
    session_start();
    include "../_headers/db_connection.php";
    global $connection;

    $uid = $_POST["uid"];

    $query = "UPDATE user_nodemcu_com SET nodemcu_freeze_flag = FALSE ";
    $query .= "WHERE unc_user_unique_id = '".$uid."';";

    $result = mysqli_query( $connection, $query );

    if ( $result ){
        // Check user_freeze_flag for True
        $query = "SELECT user_freeze_flag FROM user_nodemcu_com ";
        $query .= "WHERE unc_user_unique_id = '".$uid."';";

        $result = mysqli_query( $connection, $query );
        
        if( mysqli_num_rows( $result ) > 0 ){
            $result = mysqli_fetch_assoc( $result );
            $result = (int)$result["user_freeze_flag"];

            if( $result ){
                // If user_freeze_flag is True send 0
                $query = "UPDATE user_nodemcu_com SET nodemcu_freeze_flag = FALSE ";
                $query .= "WHERE unc_user_unique_id = '".$uid."';";

                $result = mysqli_query( $connection, $query );
                if( $result ){
                    // Sending 0
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
    