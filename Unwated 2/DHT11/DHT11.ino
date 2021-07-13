#include "DHT.h"
#define DHTTYPE DHT11
#define dpin D1

DHT dht(dpin,DHTTYPE);
void setup() 
{
 Serial.begin(9600);
 dht.begin();
}

void loop() 
{  
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  Serial.print("Humidity: ");
  Serial.print(h);
  Serial.println("%");
  Serial.print("Temperature: ");
  Serial.print(t);
  Serial.println("*C");
  delay(3000);
}
