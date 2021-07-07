<?php

    ini_set('display_errors', '1');
    include "../_headers/db_connection.php";

    $sql = "SELECT user_unique_id , user_full_name FROM user_login WHERE user_email_id = 'keerthana@farmato.in' AND user_password = '8622f0f69c91819119a8acf60a248d7b36fdb7ccf857ba8f85cf7f2767ff8265'";

    global $connection;

    $res = mysqli_query( $connection, $sql );

    echo mysqli_num_rows( $res );


