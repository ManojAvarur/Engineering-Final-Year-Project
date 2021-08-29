void send_json_sensor_data( String location, String JsonData ){
    int httpCode;
    do{
        HTTPClient http;
        http.begin(client, URL+"/iotrequest/"+location+"?");
        http.addHeader("Content-Type", "application/json");
        
        httpCode = http.POST(JsonData);
        
        http.end();

        Serial.println("Inside Send Json for Location : "+location+"\nResponce Code : " + String( httpCode ) );  
        
        if( httpCode != 200 ){
            delay(1000);
        }

    }while( httpCode != 200 );
}