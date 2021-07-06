void setup() {
  Serial.begin(9600);
  pinMode(D7, OUTPUT);
}

void loop() {
  delay(5000);
  digitalWrite(D7,LOW);  
  Serial.print("On");
  delay(5000);
  digitalWrite(D7,HIGH); 
  Serial.print("Off");
}
