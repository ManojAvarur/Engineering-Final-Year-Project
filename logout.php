<?php

    session_start();

    if ( isset( $_COOKIE['token_id_1'] ) && isset( $_COOKIE['token_id_2'] ) ){
 
        setcookie("token_id_1", "", time() - 3600, "/");   
        setcookie("token_id_2", "", time() - 3600, "/");   

    }

    session_destroy();

    header('location:index.php');
        
?>