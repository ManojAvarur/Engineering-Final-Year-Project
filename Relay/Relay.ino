void setup() {
  Serial.begin(9600);
  pinMode(D2, OUTPUT);
}

void loop() {
  delay(5000);
  digitalWrite(D2,LOW);  
  Serial.print("On");
//  delay(5000);
//  digitalWrite(D7,HIGH); 
  Serial.print("Off");
}
