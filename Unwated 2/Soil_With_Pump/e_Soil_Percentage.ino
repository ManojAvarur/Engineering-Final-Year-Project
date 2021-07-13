bool soil_percentage_for_irrigation(){
  MOISTURE_VALUE = analogRead(SOIL_PIN);
  PERCENTAGE = map(MOISTURE_VALUE, MAP_LOW, MAP_HIGH, 0, 100);
  if( PERCENTAGE >= 90 ){
    return false;
  } else {
    return true;
  }
}
