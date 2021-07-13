#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
StaticJsonDocument<48> doc;

const char* ssid = "";
const char* password = "";
WiFiClient client;

void setup() {
  Serial.begin(9600);
  setup_wifi();
}

void loop() {
  Serial.print("");
  
  insert_into_database();
  delay(2000);
//  Serial.print("Insertion Successfull");
}

void insert_into_database(){
  HTTPClient http;
  http.begin(client, "http://192.168.43.225/website/farmato/handel_requests/iotrequest/db_nodemcu_freeze_check.php?");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpCode = http.POST("uid=ccac34d923330a2968f12e163d5a2cd6");

  Serial.println(httpCode);  
  String res = http.getString() ;

  Serial.print( res );
  deserializeJson(doc, res);
  String result;
//  {"result": 0}

if( doc["result"] ){
    Serial.println("Code is excuted");  
} else {
    Serial.println("Code not excuted"); 
}

  http.end();

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
