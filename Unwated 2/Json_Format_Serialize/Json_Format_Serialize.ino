#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>

const char* ssid = "";
const char* password = "";
WiFiClient client;


String jsonDoc;

void insert_into_database();
void setup_wifi();

void setup() {

  Serial.begin(9600);
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

void loop() {
  const int capacity = JSON_OBJECT_SIZE(3);
  StaticJsonDocument<capacity> doc;
  
  doc["value"] = 42;
  doc["lat"] = 48.748010;
  doc["lon"] = 2.293491;

//  JsonObject obj = doc.to<JsonObject>();
  serializeJson(doc, jsonDoc);
  
  insert_into_database( );

  
  delay(1000000);
}

void insert_into_database( ){
  
  
  Serial.println(jsonDoc);
  HTTPClient http;
  http.begin(client, "http://192.168.2.7/iot/test.php?");
  http.addHeader("Content-Type", "application/json");
  int httpCode = http.POST(jsonDoc);

  Serial.println(httpCode);  
  Serial.println( http.getString() ); 

  http.end();

}
