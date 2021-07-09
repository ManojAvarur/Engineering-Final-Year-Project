<?php
    include "_headers/functions.php";
    session_start();

    if( isset( $_SESSION["mail"] ) && !empty( $_SESSION["mail"]["message"] ) && !empty( $_SESSION["mail"]["subject"] ) ){
        mail_to( $_SESSION["email-id"], $_SESSION["mail"]["message"], $_SESSION["mail"]["subject"] );
    }

    if( isset( $_SERVER['HTTP_REFERER'] ) )
        header('location:'.$_SERVER['HTTP_REFERER']);
    else    
        header('location:../index.php');


?>