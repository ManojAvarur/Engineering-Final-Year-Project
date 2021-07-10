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

    serializeJson(doc, JsonData);
    send_json_data( "db_unc_update.php", JsonData );
   
}