String nodemcu_freeze_check(String inside){
  int httpCode;
  String result;
  do{
    HTTPClient http;
    http.begin(client, URL+"/iotrequest/db_nodemcu_freeze_check.php?");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    httpCode = http.POST("uid=" + USER_ID);
    result = http.getString(); 

    http.end();

    Serial.println("\n\nInside NodeMCU Freez Check\n\tCalled From :" + inside +"RESPONSE :  "+result+"\nResponce Code : " + String( httpCode ) );
    
    if( httpCode != 200 ){
        delay(1000);
    }
    
  }while( httpCode != 200 );

  deserializeJson(Json_result_responce, result);
  return Json_result_responce["result"].as<String>();
//  return Json_result_responce["result"].as<String>().toInt();
}
