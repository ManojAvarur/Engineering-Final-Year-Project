void manual_irrigation_on(){
    StaticJsonDocument<96> doc;
    String result;
    
    while( true ){
        // {"irrigation_manual_overide_request":"0","sensor_data_request":"0"}
        result = fetch_json( "db_unc_fetch_requests.php", "uid="+USER_ID );
        deserializeJson(doc, result);

    
        if( !doc["irrigation_manual_overide_request"].toInt() ){
            digitalWrite( RELAY_2, HIGH );
            Serial.println("Manual Overide Irrigation - Pump OFF");
            break;
        }

        if( digitalRead(WL_LOW) == 0 ){
            Serial.println("\tTank Water Level Low");
            digitalWrite( RELAY_2, HIGH );
            pump_water_to_tank( false );
        } else {
            pinMode(WL_LOW, OUTPUT);
            digitalWrite(WL_LOW, LOW);
            pinMode(WL_LOW, INPUT);
        }
        
        digitalWrite( RELAY_2, LOW );
        Serial.println("Manual Overide Irrigation - Pump ON");

        delay(1000);
    }
}