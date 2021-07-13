void irrigate_soil(){
  
  do{
      digitalWrite( RELAY_2, LOW );
      Serial.print("Pump On - ");
      Serial.println(PERCENTAGE);
      delay(1000);
  } while( soil_percentage_for_irrigation() );
  digitalWrite( RELAY_2, HIGH );
  Serial.println("Pump Off");
  delay(1000);
    
}
