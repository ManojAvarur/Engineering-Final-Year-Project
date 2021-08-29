void send_sensor_data(){
    HUMIDITY = dht.readHumidity();
    TEMPERATURE = dht.readTemperature();
    MOISTURE_VALUE = analogRead(SOIL_PIN);
    PERCENTAGE = map(MOISTURE_VALUE, MAP_LOW, MAP_HIGH, 0, 100);

    StaticJsonDocument<128> doc;
    String JsonData;

    doc["uid"] = USER_ID;
    doc["soil_moisture"] = PERCENTAGE;
    doc["temperature"] = TEMPERATURE;
    doc["humidity"] = HUMIDITY;

    if( DEBUG_CODE ){
            Serial.println("Inside send_sensor_data and USER_ID, PERCENTAGE, TEMPERATURE, HUMIDITY  is set to : "+ USER_ID + " "+ String( PERCENTAGE ) + " "+ String( TEMPERATURE ) + " "+ String( HUMIDITY ) );
            delay(DEBUG_DELAY_TIME);
        }


    serializeJson(doc, JsonData);
    send_json_sensor_data( "db_unc_update.php", JsonData );
   
}