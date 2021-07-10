int user_request_execution(){
    // {"pump_manual_overide_request":"0","sensor_data_request":"0"}
    String result = fetch_json("dbuncfetch.php", "uid="+USER_ID );

    StaticJsonDocument<96> doc;
    deserializeJson(doc, result);

    result = doc["pump_manual_overide_request"].as<String>();
    if( result == "1" ){
        manual_irrigation_on();
        unfreeze_nodemcu();
        return;
    } 

    result = doc["sensor_data_request"].as<String>();
    if( result == "1" ) {
        send_sensor_data();
        unfreeze_nodemcu();
        return;
    }
}

