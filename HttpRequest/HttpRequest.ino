#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "Manoj";
const char* password = "Hazelnut+-";


void setup() {
  Serial.begin(9600);
  setup_wifi();
}

void loop() {
  Serial.print("");
  
  insert_into_database();
  delay(5000);
  Serial.print("Insertion Successfull");
}

void insert_into_database(){
  HTTPClient http;
  WiFiClient client;
  http.begin(client, "http://192.168.2.8/iot/connection.php?");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  http.POST("sendval=" + String(random(1, 401) / 100.0) + 
                           "&sendval2="+ String(random(1, 401) / 100.0) );
//  String payload = http.getString();                  //Get the response payload
//  Serial.println(httpCode);   //Print HTTP return code
//  Serial.println(payload); 
  
//  int http = 0;
  http.end();
  Serial.print("Completed till here!!!");
  Serial.printf("Free heap: %d\n", ESP.getFreeHeap());

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
