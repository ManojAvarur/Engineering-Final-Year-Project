void irrigate_soil(){   
    bool tank_pump_turn_on_or_not = false;
    while( true ){
        
        CURRENT_MILLIS = millis();
        if( CURRENT_MILLIS - START_MILLIS >= TIME_TO_IRRIGATE ){
            digitalWrite( RELAY_2, HIGH );
            Serial.println("Automatic Irrigation-Pump OFF");
            break;
        }

        if( digitalRead(WL_LOW) == 0 ){
            Serial.println("\tTank Water Level Low");
            digitalWrite( RELAY_2, HIGH );
            pump_water_to_tank( true );
            tank_pump_turn_on_or_not = true;
        } else {
            pinMode(WL_LOW, OUTPUT);
            digitalWrite(WL_LOW, LOW);
            pinMode(WL_LOW, INPUT);
        }
        
        digitalWrite( RELAY_2, LOW );
        Serial.println("Automatic Irrigation-Pump ON");
    }
    if( tank_pump_turn_on_or_not ){
        TIME_TO_IRRIGATE = 10000;
    }
}