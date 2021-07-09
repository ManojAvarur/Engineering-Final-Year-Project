void pump_water(){
  
   while(true){
      delay(200);
      if( digitalRead(wl_high) == 1 ){
          pinMode(wl_high, OUTPUT);
          digitalWrite(wl_high, LOW);
          pinMode(wl_high, INPUT);

          if( digitalRead(wl_high) == 1 ){
            break;
          }
        }
      
    Serial.print( digitalRead(wl_high) );
    Serial.println(" - Pump On");
    digitalWrite(relay, LOW);
    delay(1000);
  }
  
  digitalWrite(relay, HIGH);
  Serial.println("Pump Off");
  pinMode(wl_high, OUTPUT);
  digitalWrite(wl_high, LOW);
  pinMode(wl_high, INPUT);

}
