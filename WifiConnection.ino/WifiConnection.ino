#include <ESP8266WiFi.h>

const char* ssid = "Manoj";
const char* password = "Hazelnut+-";

void setup() {
  Serial.begin(9600);
  setup_wifi();
}

void loop() {

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
