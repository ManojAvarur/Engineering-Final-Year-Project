int user_request_execution(){
    // {"irrigation_manual_overide_request":"0","sensor_data_request":"0"}
    String result = fetch_json("db_unc_fetch_requests.php", "uid="+USER_ID );

    StaticJsonDocument<96> doc;
    deserializeJson(doc, result);

   
    if( doc["irrigation_manual_overide_request"] ){
        manual_irrigation_on();
        unfreeze_nodemcu();
        return 1;
    } 

    if( doc["sensor_data_request"] ) {
        send_sensor_data();
        unfreeze_nodemcu();
        return 1;
    }
}

