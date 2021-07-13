void pump_water(){
  
   while(true){
      delay(200);
      if( digitalRead(WL_HIGH) == 1 ){
          pinMode(WL_HIGH, OUTPUT);
          digitalWrite(WL_HIGH, LOW);
          pinMode(WL_HIGH, INPUT);

          if( digitalRead(WL_HIGH) == 1 ){
            break;
          }
        }
      
    Serial.print( digitalRead(WL_HIGH) );
    Serial.println(" - Pump On");
    digitalWrite(RELAY_1, LOW);
    delay(1000);
  }
  
  digitalWrite(RELAY_1, HIGH);
  Serial.println("Pump Off");
  pinMode(WL_HIGH, OUTPUT);
  digitalWrite(WL_HIGH, LOW);
  pinMode(WL_HIGH, INPUT);

}
