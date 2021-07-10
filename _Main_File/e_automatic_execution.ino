void automatic_execution(){
    HUMIDITY = dht.readHumidity();
    TEMPERATURE = dht.readTemperature();
    Serial.print("Humidity: ");
    Serial.print(h);
    Serial.print("%");
    Serial.print("Temperature: ");
    Serial.print(t);
    Serial.print("*C");

    MOISTURE_VALUE = analogRead(SOIL_PIN);
    PERCENTAGE = map(MOISTURE_VALUE, MAP_LOW, MAP_HIGH, 0, 100);
    Serial.print("Moisture percentage: ");
    Serial.print(PERCENTAGE);
    Serial.println("%");
    
    if(PERCENTAGE <= PERCENTAGE_THRESHOLD_VALUE || HUMIDITY >= HUMIDITY_THRESHOLD_VALUE || TEMPERATURE >= TEMPERATURE_THRESHOLD_VALUE){
        irrigate_soil();
        
    }
}