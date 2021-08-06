#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "";
const char* password = "";
WiFiClient client;
unsigned long START_MILLIS; 
unsigned long CURRENT_MILLIS;
unsigned long EXCUTION_TIME = 10000;
int i = 0;

void setup() {
  Serial.begin(9600);
//  setup_wifi();
  START_MILLIS = millis();
}

void loop() {
  CURRENT_MILLIS = millis();
  Serial.println("\nLoop Started with current millis = " + String( CURRENT_MILLIS ) );
  
  if( CURRENT_MILLIS - START_MILLIS <= EXCUTION_TIME ){
      Serial.println("\tExcuted for "+String( i )+" seconds");
      i++;
    }

  if( millis() > EXCUTION_TIME ){
        EXCUTION_TIME += millis() + EXCUTION_TIME;
        Serial.println("\n\t\t Changed Excution time is = " + String( EXCUTION_TIME ) +"\n\t\t Current millis is = " + String( millis() ));
        i = 0;
      }
  
  Serial.println("\nLoop Ended with current millis = " + String( millis() ));
  Serial.println("\n-----------------------------------------------------\n");
//  delay(1000);
}

void insert_into_database(){
  HTTPClient http;

  http.begin(client, "http://farmato.byethost10.com/index.php");
  
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  
  int httpCode = http.POST("dfd");
                           
  String payload = http.getString();                  
  Serial.println(httpCode);   
  Serial.println(payload); 
  
  http.end();
  Serial.print("Completed insert_into_database");
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
