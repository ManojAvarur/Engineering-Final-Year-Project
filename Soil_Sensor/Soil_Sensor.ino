int analogPin = A0;
int moistureValue;
int percentage;

int map_low = 1024;
int map_high = 40;
// int map_high = 397;

void setup()
{
  Serial.begin(9600);
}

void loop()
{
  // program for moisture sensor
  moistureValue = analogRead(analogPin);
  Serial.print("Raw: ");
  Serial.println(moistureValue);

  percentage = map(moistureValue, map_low, map_high, 0, 100);
  Serial.print(" | Percentage: ");
  Serial.println(percentage);
  delay(1000);
}
