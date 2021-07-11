<?php

    ini_set('display_errors', '1');
    session_start();
    include "../_headers/db_connection.php";
    include "../_headers/functions.php";

    $uid = 'ccac34d923330a2968f12e163d5a2cd6';
    // retrieve uid from JS
    
    $query = "UPDATE user_nodemcu_com SET nodemcu_freeze_flag = TRUE ";
    $query .= "WHERE unc_user_unique_id = ".$uid."';";
    // die($query);

    $query = mysqli_query( $connection, $query );

    $query = "SELECT user_freeze_flag FROM user_nodemcu_com ";
    $query .= "WHERE unc_user_unique_id = ".$uid.";";
    // die($query);

    $result = mysqli_query( $connection, $query );

    if( mysqli_num_rows( $result ) > 0 )
        $row = mysqli_fetch_assoc( $result );

    if( $row['user_freeze_flag'] != TRUE ){

        // echo "Javascript you are ready to go";
        echo TRUE;
    }
    
    else{

        $query = "UPDATE user_nodemcu_com SET nodemcu_freeze_flag = FALSE ";
        $query .= "WHERE unc_user_unique_id = ".$uid.";";
        // echo $query;

        $query = mysqli_query( $connection, $query );

        // echo "Send error to Javascript";
        echo FALSE;

    }

    
?>