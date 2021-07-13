#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

#include <ArduinoJson.h>
StaticJsonDocument<48> Json_result_responce;

const char* ssid = "Manoj";
const char* password = "Hazelnut+-";
WiFiClient client;

void setup_wifi();
void nodemcu_freeze_check();

void setup(){
  Serial.begin(9600);
  setup_wifi();
}

void loop(){
  nodemcu_freeze_check();
//  delay(3000);
}

void nodemcu_freeze_check(){
  int httpCode;
  
String result;
  do{
    HTTPClient http;
    http.begin(client, "http://192.168.2.5/website/handel_requests/iotrequest/db_nodemcu_freeze_check.php?");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    httpCode = http.POST("uid=ccac34d923330a2968f12e163d5a2cd6");
    result = http.getString(); 

    http.end();

    Serial.println("Responce : "+ result + "\nResponce Code : " + String( httpCode ) );
    
    if( httpCode != 200 ){
        delay(1000);
    }
    
  }while( httpCode != 200 );

  deserializeJson(Json_result_responce, result);

  Serial.println( Json_result_responce["result"].as<String>().toInt() );
//  Json_result_responce.clear();
//  Json_result_responce.delete();

}

void setup_wifi(){
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
}
