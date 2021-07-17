int Balarm = D5;  
int PIRsensor = D1; 

void setup() {
  pinMode(PIRsensor, INPUT);  
  pinMode(Balarm, OUTPUT);   
  digitalWrite (Balarm, LOW);
  //  Serial.begin(9600); 
//  pinMode(LED_BUILTIN, OUTPUT);
//  digitalWrite(LED_BUILTIN, LOW);
}

void loop(){
  int state = digitalRead(PIRsensor); 
    if(state == HIGH){                   
      tone(Balarm,1000);
//      digitalWrite(LED_BUILTIN, HIGH);
      delay(1000);                    
      noTone(Balarm);                  
    }
//    else {  
//      digitalWrite(LED_BUILTIN, LOW);
//      }
}
