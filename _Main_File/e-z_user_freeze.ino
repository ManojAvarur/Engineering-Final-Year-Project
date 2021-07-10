int user_freeze_flag(){
    int httpCode;
    String result;
    do{
        HTTPClient http;
        http.begin(client, URL+"/iotrequest/db_unc_user_freeze.php?");
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        
        httpCode = http.POST("uid="+USER_ID );
        result = http.getString(); 
        
        http.end();

        Serial.println("Inside User Freeze Flag\nResponce Code : " + String( httpCode ) );  
        
        if( httpCode != 200 ){
            delay(1000);
        }

    }while( httpCode != 200 );
    
    deserializeJson(Json_result_responce, result);
    result = Json_result_responce["result"].as<String>();
    return result.toInt();

}