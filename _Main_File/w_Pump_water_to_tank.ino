void pump_water_to_tank( bool change_time ){
    long pump_start_time = millis();
    while( true ){
        delay(200);
        if( digitalRead(WL_HIGH) == 1 ){
            pinMode(WL_HIGH, OUTPUT);
            digitalWrite(WL_HIGH, LOW);
            pinMode(WL_HIGH, INPUT);
            
            // Check again 
            if( digitalRead(WL_HIGH) == 1 ){
                Serial.println("\tTank Water Level High");
                break;
            }
        }
    
        Serial.println("\t\tTank - Pump On");
        digitalWrite(RELAY_1, LOW);
        delay(1000);
    }

    digitalWrite(RELAY_1, HIGH);
    Serial.println("\t\tTank - Pump Off");
    pinMode(WL_HIGH, OUTPUT);
    digitalWrite(WL_HIGH, LOW);
    pinMode(WL_HIGH, INPUT);
    
    long pump_end_time = millis();
    if( change_time ){
        TIME_TO_IRRIGATE = TIME_TO_IRRIGATE + ( pump_end_time - pump_start_time );
    }
    Serial.println(TIME_TO_IRRIGATE);
}
