<?php
    ini_set('display_errors', '1');
    include "../../_headers/db_connection.php";
    global $connection;

    $uid = $_POST["uid"];

    $query = "UPDATE user_nodemcu_com ";
    $query .= "SET new_data_recieved_flag = FALSE ";
    $query .= "WHERE unc_user_unique_id = '".$uid."';";

    $result = mysqli_query( $connection, $query );
    if( $result ){
        http_response_code(200);

    } else {
        http_response_code(500);
        echo mysqli_error( $connection );
    }
?>