void update_database(){
    /*{
        "uid": "ccac34d923330a2968f12e163d5a2cd6",
        "humidity": 100,
        "soil_moisture": 100,
        "temperature": 100,
        "irrigation_on_off_status":1,
        "pump_on_off_status":1
    }*/

    
    String JsonData;

    DB_update["uid"] = USER_ID;
    DB_update["soil_moisture"] = PERCENTAGE;
    DB_update["temperature"] = TEMPERATURE;
    DB_update["humidity"] = HUMIDITY;
    DB_update["irrigation_on_off_status"] = IRRIGARTION_ON_OFF_STATUS;
    DB_update["pump_on_off_status"] = PUMP_ON_OFF_STATUS;

    serializeJson(DB_update, JsonData);
    send_json_sensor_data( "db_update_sensor_data.php", JsonData );

    PUMP_ON_OFF_STATUS = 0;
}