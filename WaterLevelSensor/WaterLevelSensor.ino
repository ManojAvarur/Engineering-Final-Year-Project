#define inp D7

void setup() {
  pinMode(inp, INPUT);     // Initialize the LED_BUILTIN pin as an output
  Serial.begin(9600); 
}

// the loop function runs over and over again forever
void loop() {
  int volt = digitalRead(inp);
  Serial.println( volt );
  if (volt == 1){
    pinMode(inp, OUTPUT);
    digitalWrite(inp, LOW);
    pinMode(inp, INPUT); 
  }
  delay(2000);                      // Wait for two seconds (to demonstrate the active low LED)
}
