void setup() {
  pinMode(D1, INPUT);     // Initialize the LED_BUILTIN pin as an output
  Serial.begin(9600); 
}

// the loop function runs over and over again forever
void loop() {
  int volt = digitalRead(D1);
  Serial.println( volt );
  if (volt == 1){
    pinMode(D1, OUTPUT);
    digitalWrite(D1, LOW);
    pinMode(D1, INPUT); 
  }
  delay(2000);                      // Wait for two seconds (to demonstrate the active low LED)
}
