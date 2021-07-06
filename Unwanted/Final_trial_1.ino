#include "DHT.h"
#include <ESP8266WiFi.h>
#include<WiFiClient.h>
#include<ESP8266HTTPClient.h>
// dht pin
#define DHTTYPE DHT11
#define dpin D0

DHT dht(dpin, DHTTYPE);

//Moisture sensor pins
int analogPin = A0;
int moistureValue;
int percentage;
int map_high = 40;
int map_low = 1024;
void setup() 
{
  // put your setup code here, to run once:
  Serial.begin(9600);
  // realy pin
  pinMode(D7, OUTPUT);
  char ssid[] = "";
  char pass[] = "";
  Serial.print("Connecting to Wifi...");
  WiFi.begin(ssid,pass);
  while(WiFi.status()!=WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println();
  Serial.print("Connected to ");
  Serial.println(ssid);
  dht.begin();
}

void loop() 
{

  //Read humidity and temperature
  
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  Serial.print("Humidity: ");
  Serial.print(h);
  Serial.print("%");
  Serial.print("Temperature: ");
  Serial.print(t);
  Serial.print("*C");

  //Read moisture values
  
  moistureValue = analogRead(analogPin);
  percentage = map(moistureValue, map_low, map_high, 0, 100);
  Serial.print("Moisture percentage: ");
  Serial.print(percentage);
  Serial.println("%");

  //Check for the need to water plants
  if(percentage >= 100 && h >= 48.00 && t >= 25.00)
  {
    //water level code:
    // if(conditions)
//    {
//      digitalWrite(D7,LOW);  
//    }
//    else 
//    {
//      Serial.println("Water level not sufficient, please refill");
//    }
  }
  else
  {
    digitalWrite(D7, HIGH);
  }
  delay(10000);
  
}
