//#define wl_low D6
////#define wl_high D7
//
//#define relay D1
//
//
//void setup(){
//  
//  Serial.begin(9600);
//  pinMode(relay, OUTPUT);
//  pinMode(wl_low, INPUT);
////  pinMode(wl_high, INPUT);
////  pinMode(wl_high, INPUT);
//  
//  digitalWrite(relay, HIGH);
//}
//
//void loop(){
//   Serial.println( digitalRead(wl_low) );
//  if( digitalRead(wl_low) == 0 ){
//    Serial.println("Water Level - Low");
//    Serial.println( digitalRead(wl_low) );
//    
//    while(true ){
//          delay(200);
//          if( digitalRead(wl_low) == 1 ){
//              pinMode(wl_low, OUTPUT);
//              digitalWrite(wl_low, LOW);
//              pinMode(wl_low, INPUT);
//
//              if( digitalRead(wl_low) == 1 ){
//                break;
//              }
//            }
//      
//      Serial.print( digitalRead(wl_low) );
//      Serial.println(" - Pump On");
//      digitalWrite(relay, LOW);
//      delay(1000);
//    }
//    
//    digitalWrite(relay, HIGH);
//    Serial.println("Pump Off");
//    pinMode(wl_low, OUTPUT);
//    digitalWrite(wl_low, LOW);
//    pinMode(wl_low, INPUT);
//    
//  } else {
//    Serial.println("water Level - High");
//    pinMode(wl_low, OUTPUT);
//    digitalWrite(wl_low, LOW);
//    pinMode(wl_low, INPUT);
//  }
//  delay(1000);
//}
