void update_database(){
    /*{
        "uid": "ccac34d923330a2968f12e163d5a2cd6",
        "humidity": 100,
        "soil_moisture": 100,
        "temperature": 100,
        "irrigation_on_off_status":1,
        "pump_on_off_status":1
    }*/

    StaticJsonDocument<192> doc;
    String JsonData;

    doc["uid"] = USER_ID;
    doc["soil_moisture"] = PERCENTAGE;
    doc["temperature"] = TEMPERATURE;
    doc["humidity"] = HUMIDITY;
    doc["irrigation_on_off_status"] = IRRIGARTION_ON_OFF_STATUS;
    doc["pump_on_off_status"] = PUMP_ON_OFF_STATUS;

    serializeJson(doc, JsonData);
    send_json_sensor_data( "db_update_sensor_data.php", JsonData );

    PUMP_ON_OFF_STATUS = 0;
}