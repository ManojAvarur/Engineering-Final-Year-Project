#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>

const char* ssid = "Manoj";
const char* password = "Hazelnut+-";
WiFiClient client;
 
void setup_wifi();
void pnt();
void setup(){
    Serial.begin(9600);
    setup_wifi();
    pnt();
}

void loop(){

  Serial.print("Hello");
    
}

void pnt(){
    String data;
  int httpCode;
  do{
    HTTPClient http;
    http.begin(client, "http://192.168.2.7/iot/test.php?");
    http.addHeader("Content-Type", "application/text");
    httpCode = http.POST("none");

    Serial.println(httpCode);  
    data = http.getString(); 
    http.end();
  }
 while( httpCode != 200 );
    StaticJsonDocument<200> doc;
    deserializeJson(doc, data);

    String r = doc["sensor_data_request"];
    Serial.println( r );
}
