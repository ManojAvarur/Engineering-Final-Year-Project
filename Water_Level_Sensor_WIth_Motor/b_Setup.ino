void setup(){
  Serial.begin(9600);
  pinMode(RELAY_1, OUTPUT);
  pinMode(WL_LOW, INPUT);
  pinMode(WL_HIGH, INPUT);
  digitalWrite(RELAY_1, HIGH);
}
