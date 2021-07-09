void loop(){
   Serial.println( digitalRead(wl_low) );
  if( digitalRead(wl_low) == 0 ){
    Serial.println("Water Level ( END ) - Low");
    Serial.println( digitalRead(wl_low) );
    pump_water();
  } else {
    Serial.println("Water Level ( END ) - High");
    pinMode(wl_low, OUTPUT);
    digitalWrite(wl_low, LOW);
    pinMode(wl_low, INPUT);
  }
  delay(1000);
}
