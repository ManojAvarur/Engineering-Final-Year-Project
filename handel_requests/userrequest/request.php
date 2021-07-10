<?php
    ini_set('display_errors', '1');
    session_start();
    include "../_headers/db_connection.php";
    // include "../_headers/functions.php";
    
    global $connection;
    $arr = $_GET;

    if( isset( $arr['value'] ) ){

        $value = $arr['value'];

        if( $value == 'sensor_data' ){

            $query = "UPDATE user_nodemcu_com SET sensor_data_request = TRUE ";
            $query .= "WHERE unc_user_unique_id = 'ccac34d923330a2968f12e163d5a2cd6';";

            $result = mysqli_query( $connection, $query );

            if( $result )
                echo TRUE;
            
            else
                echo FALSE;
        }

        elseif( $value == 'pump_manual_override' ){

            $query = "UPDATE user_nodemcu_com SET pump_manual_overide_request = TRUE ";
            $query .= "WHERE unc_user_unique_id = 'ccac34d923330a2968f12e163d5a2cd6';";

            $result = mysqli_query( $connection, $query );

            if( $result )
                echo TRUE;
            
            else
                echo FALSE;

        }

    }

?>