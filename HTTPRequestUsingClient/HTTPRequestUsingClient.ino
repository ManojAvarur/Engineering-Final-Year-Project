#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "Manoj";
const char* password = "Hazelnut+-";
String server = "192.168.2.8/iot";

WiFiClient client;

void setup() {
  Serial.begin(9600);
  setup_wifi();
}

void loop() {
  if (client.connect(server,80)){ 
    String postStr = "sendval=";
    postStr += String( random(5,100)/100.0 );
    postStr += "&sendval2=";
    postStr += String( random(5,100)/100.0 );
    postStr += "\r\n\r\n";


    client.print("POST /connection.php HTTP/1.1\n");
    client.print("Host: "+ server +"\n");
    client.print("Connection: close\n");
    client.print("Content-Type: application/x-www-form-urlencoded\n");
    client.print("Content-Length: ");
    client.print(postStr.length());
    client.print("\n\n");

    client.print(postStr);
    
  }

   client.stop();
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
