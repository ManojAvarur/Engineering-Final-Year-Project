void setup(){
  Serial.begin(9600);
  pinMode(relay, OUTPUT);
  pinMode(wl_low, INPUT);
  pinMode(wl_high, INPUT);
  digitalWrite(relay, HIGH);
}
