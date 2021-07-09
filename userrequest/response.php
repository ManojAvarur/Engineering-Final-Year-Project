<?php
    ini_set('display_errors', '1');
    session_start();
    include "../_headers/db_connection.php";
    include "../_headers/functions.php";

    // GET uid from JAVASCRIPT
    $arr = $_GET;

    if ( isset( $arr['uid'] ) ){

        $query = "SELECT * FROM user_nodemcu_com ";
        $query .= "WHERE unc_user_unique_id = '".$arr['uid']."';";

        // die($query);
        $result = mysqli_query( $connection, $query );

        if( mysqli_num_rows( $result ) > 0 )
            $row = mysqli_fetch_assoc( $result );
        
        else    
            echo "Error Occured";

        $result_in_json = [
            "temperature" => $row['temperature'],
            "humidity" => $row['humidity'],
            "soil_moisture" => $row['soil_moisture']
        ];

        echo json_encode( $result_in_json);

        $query = "UPDATE user_nodemcu_com SET sensor_data_request = FALSE, user_freeze_flag = FALSE, ";
        $query .= "nodemcu_freeze_flag = FALSE, temperature = 0, humidity = 0, soil_moisture = 0, ";
        $query .= "pump_manual_overide_request = FALSE, data_recieved_flag = FALSE ";

        $result = mysqli_query( $connection, $query );

        if( $result )
            echo "<br>Successfully sent data to Javascript";
        
        else    
            echo "Error occured";

    }

?>
