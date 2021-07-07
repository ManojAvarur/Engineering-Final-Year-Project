<?php
ini_set('display_errors', '1');


include "../_headers/db_connection.php";
global $connection;


if( isset( $_COOKIE["token_id_1"] ) &&  isset( $_COOKIE["token_id_2"] )  && !empty( $_COOKIE["token_id_1"] ) && !empty( $_COOKIE["token_id_2"] ) ){
    
    global $connection;

    //SELECT cookie_user_unique_id FROM cookie_data WHERE token_id_1 = 'f48a18ff4d1b6bfea59e832981ebc0d3' AND token_id_2 = '9764028e1b3a4592ff3f8dca1dd8f296');"

    $query = "SELECT user_full_name, user_unique_id FROM user_login ";
    $query .= "WHERE user_unique_id in ( ";
    $query .= "SELECT cookie_user_unique_id FROM cookie_data ";
    $query .= "WHERE token_id_1  = '".mysqli_escape_string( $connection, $_COOKIE["token_id_1"] )."' ";
    $query .= "AND token_id_2 = '".mysqli_escape_string( $connection, $_COOKIE["token_id_2"] )."' ); ";

    // die($query."");
    $result = mysqli_query($connection, $query);
    // $x = mysqli_fetch_assoc( $result );
    echo "Hello";
    // print_r($x);
    if( mysqli_num_rows( $result ) > 0 ){
        echo "Hello";
        $result = mysqli_fetch_assoc($result);
        $_SESSION['token-id'] = $result['user_unique_id'];
        $_SESSION["user_name"] = $result["user_full_name"];
        echo $_SESSION["user_name"];
        echo $_SESSION['token-id'] ;
        // if( $redirect ){
        //     header('location:'.$location);
        }
        die();
    } 

// } else {
//     return 0;
// }


//     $file = fopen( "../_headers/credentials.txt", "r" );
//     while( !feof($file) ){
//     echo fgets($file)."<br>";
// }
// echo $file;
// echo fread($file, filesize("../_headers/credentials.txt"));