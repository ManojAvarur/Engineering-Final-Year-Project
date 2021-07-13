void loop()
{
  // program for moisture sensor
  digitalWrite( RELAY_2, HIGH );
  MOISTURE_VALUE = analogRead(SOIL_PIN);
  Serial.print("Raw: ");
  Serial.println(MOISTURE_VALUE);

  PERCENTAGE = map(MOISTURE_VALUE, MAP_LOW, MAP_HIGH, 0, 100);
  Serial.print(" | Percentage: ");
  Serial.println(PERCENTAGE);
  delay(1000);
  if( PERCENTAGE <= 40 ){
    irrigate_soil();
  }
  delay(1000);
}
