#include <ESP8266WiFi.h>

const char* ssid = "Manoj";
const char* password = "Hazelnut+-";

WiFiClient client;
char server[] = "www.iotproject.ezyro.com";
String postData;

void setup() {
  Serial.begin(9600);
  setup_wifi();
}

void loop() {
  postData = "sendval=" + String(random(13,377)/97.43) + "sendval2=" + String(random(13,377)/97.43);
  if (client.connect(server, 80)) {
      client.println("POST /iotest/connection.php HTTP/1.1");
      client.println("Host: www.iotproject.ezyro.com");
      client.println("Content-Type: application/x-www-form-urlencoded");
      client.print("Content-Length: ");
      client.println(postData.length());
      client.println();
      client.print(postData);
  }

  if (client.connected()) {
    client.stop();
  }

  Serial.println(postData);

  delay(3000);
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
