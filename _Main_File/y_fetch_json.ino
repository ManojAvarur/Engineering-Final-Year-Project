String fetch_json( String location, String variables ){
    int httpCode;
    String result;
    do{
        HTTPClient http;
        http.begin(client, URL+"/iotrequest/"+location+"?");
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        httpCode = http.POST(variables);
        result = http.getString(); 

        if( DEBUG_CODE ){
          Serial.println( "DEBUG Code Result : " + result );
          delay( DEBUG_DELAY_TIME );
        }

        Serial.println( result );
        http.end();
        Serial.println("Inside Fetch Json from Location : "+location+"\nResponce Code : " + String( httpCode ) );  
        if( httpCode != 200 ){
            delay(1000);
        }
    }while( httpCode != 200 );
    
    return result;

}