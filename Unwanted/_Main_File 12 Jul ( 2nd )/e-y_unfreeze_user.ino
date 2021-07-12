void unfreeze_user(){
    int httpCode;
    do{
        HTTPClient http;
        http.begin(client, URL+"/iotrequest/db_unc_unfreeze_user.php?");
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        
        httpCode = http.POST("uid="+USER_ID);
        
        http.end();

        Serial.println("Inside User Un-Freeze Function\nResponce Code : " + String( httpCode ) );  
        
        if( httpCode != 200 ){
            delay(1000);
        }

    }while( httpCode != 200 );

}