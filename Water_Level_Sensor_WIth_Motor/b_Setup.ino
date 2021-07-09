void setup(){
  Serial.begin(9600);
  pinMode(RELAY_1, OUTPUT);
  pinMode(wl_low, INPUT);
  pinMode(wl_high, INPUT);
  digitalWrite(RELAY_1, HIGH);
}
