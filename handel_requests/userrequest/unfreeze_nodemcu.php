<?php
    ini_set('display_errors', '1');
    include "../../_headers/db_connection.php";
    global $connection;

    $uid = $_POST["uid"];

    $query = "UPDATE user_nodemcu_com SET nodemcu_freeze_flag = FALSE ";
    $query .= "WHERE unc_user_unique_id = '".$uid."';";

    $result = mysqli_query( $connection, $query );
    if( $result ){
        $result = [ "result" => 1 ];
        echo json_encode( $result );
    } else {
        $result = [ "result" => 0 ];
        echo json_encode( $result );
    }
