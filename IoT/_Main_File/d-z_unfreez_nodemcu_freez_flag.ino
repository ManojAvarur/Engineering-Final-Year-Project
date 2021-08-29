// void unfreeze_nodemcu(){
//     int httpCode;
//     String result;
//     do{
//         HTTPClient http;
//         http.begin(client, URL+"/iotrequest/db_nodemcu_unfreeze.php?");
//         http.addHeader("Content-Type", "application/x-www-form-urlencoded");
//         httpCode = http.POST("uid="+USER_ID);
//         result = http.getString();
//         deserializeJson(Json_result_responce, result);
//         http.end();
//         Serial.println("Inside un-Freezing NodeMCU\nResponce Code : " + String( httpCode ) );  
        
        
//         if( httpCode != 200 ){
//             delay(1000);
//         } else {
//             result = Json_result_responce["result"].as<String>();
//             return result.toInt(); 
//         }
//     }while( httpCode != 200);
// }