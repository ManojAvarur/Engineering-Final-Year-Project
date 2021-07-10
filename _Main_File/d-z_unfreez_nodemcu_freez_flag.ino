void unfreeze_nodemcu(){
    int httpCode;
    do{
        HTTPClient http;
        http.begin(client, URL+"/iotrequest/dbnodemcuunfreeze.php?");
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        httpCode = http.POST("uid="+USER_ID);
        http.end();

        Serial.println("Inside Freezing NodeMCU\nResponce Code : " + String( httpCode ) );  
        if( httpCode != 200 ){
            delay(1000);
        }
    while( httpCode != 200);
}