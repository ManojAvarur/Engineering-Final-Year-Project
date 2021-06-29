#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

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
  delay(5000);
  Serial.print("Insertion Successfull");
}

void insert_into_database(){
  HTTPClient http;

  http.begin(client, "http://iotproject.ezyro.com/iotest/connection.php?val1=2323.434&val2=356.8889");
  
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  
  int httpCode = http.POST("");
                           
  String payload = http.getString();                  
  Serial.println(httpCode);   
  Serial.println(payload); 
  
  http.end();
  Serial.print("Completed till here!!!");
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
