void automatic_execution(){
    HUMIDITY = dht.readHumidity();
    TEMPERATURE = dht.readTemperature();
    Serial.print("Humidity: ");
    Serial.print(HUMIDITY);
    Serial.print("%");
    Serial.print("Temperature: ");
    Serial.print(TEMPERATURE);
    Serial.print("*C");

    MOISTURE_VALUE = analogRead(SOIL_PIN);
    PERCENTAGE = map(MOISTURE_VALUE, MAP_LOW, MAP_HIGH, 0, 100);
    Serial.print("Moisture percentage: ");
    Serial.print(PERCENTAGE);
    Serial.println("%");

    Serial.println("Inside Automatic Execution");
    
    if( user_freeze_flag() ){
        if(HUMIDITY >= HUMIDITY_THRESHOLD_VALUE || TEMPERATURE >= TEMPERATURE_THRESHOLD_VALUE){
          if( PERCENTAGE <= PERCENTAGE_THRESHOLD_VALUE ){
            IRRIGARTION_ON_OFF_STATUS = 1;
            PUMP_ON_OFF_STATUS = 0;
            irrigate_soil();
          }
          update_database();
        }
        unfreeze_user();
    }
}
