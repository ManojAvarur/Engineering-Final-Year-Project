void loop(){
   Serial.println( digitalRead(WL_LOW) );
  if( digitalRead(WL_LOW) == 0 ){
    Serial.println("Water Level ( MID ) - Low");
    Serial.println( digitalRead(WL_LOW) );
    pump_water();
  } else {
    Serial.println("Water Level ( MID ) - High");
    pinMode(WL_LOW, OUTPUT);
    digitalWrite(WL_LOW, LOW);
    pinMode(WL_LOW, INPUT);
  }
  delay(1000);
}
