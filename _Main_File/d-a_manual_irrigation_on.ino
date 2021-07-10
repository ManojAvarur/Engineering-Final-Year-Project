void manual_irrigation_on(){
    StaticJsonDocument<96> doc;
    String result;
    while( true ){

        result = fetch_json( "dbuncfetchrequests.php", "uid="+USER_ID );
        deserializeJson(doc, result);
        result = doc["irrigation_manual_overide_request"].as<String>();
        if( result == "0" ){
            digitalWrite( RELAY_2, HIGH );
            Serial.println("Manual Overide Irrigation-Pump OFF");
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
        Serial.println("Manual Overide Irrigation-Pump ON");
    }
}