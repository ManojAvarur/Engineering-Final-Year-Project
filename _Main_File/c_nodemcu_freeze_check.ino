bool nodemacu_freeze_check(){
  int httpCode;
  String result;
  do{
    HTTPClient http;
    http.begin(client, "/iotrequest/nodemcufreezcheck.php?");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    httpCode = http.POST("uid=" + USER_ID);
    result = http.getString(); 
    http.end();
    Serial.println("Inside NodemCU Freez Check \nResponce Code : " + String( httpCode ) );
    if( httpCode != 200 ){
        delay(1000);
    }
    
  }while( httpCode != 200 );

    if( result == "1" ){
        return true;
    } else {
        return false;
    }

}
