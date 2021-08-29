<?php
    ini_set('display_errors', '1');
    include "../../_headers/db_connection.php";
    global $connection;

    

    $query = "UPDATE user_nodemcu_com ";
    $query .= "SET irrigation_manual_overide_request = FALSE, sensor_data_request = FALSE,";
    $query .= "nodemcu_freeze_flag = FALSE, new_data_recieved_flag = FALSE ";
    $query .= "WHERE unc_user_unique_id = '".$_POST["uid"]."';";

    mysqli_query( $connection, $query );

?>