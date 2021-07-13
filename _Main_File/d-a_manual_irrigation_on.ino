void manual_irrigation_on(){

    String result;
    
    while( true ){

        if( digitalRead(WL_LOW) == 0 ){
            Serial.println("\tTank Water Level Low");
            digitalWrite( RELAY_2, HIGH );
            pump_water_to_tank( false );
        } else {
            pinMode(WL_LOW, OUTPUT);
            digitalWrite(WL_LOW, LOW);
            pinMode(WL_LOW, INPUT);
        }

        // {"irrigation_manual_overide_request":"0","sensor_data_request":"0"}
        result = fetch_json( "db_unc_fetch_requests.php", "uid="+USER_ID );
        deserializeJson(User_request_check, result);

        result = User_request_check["irrigation_manual_overide_request"].as<String>();

        if( DEBUG_CODE ){
            Serial.println("Inside user request excution and irrigation_manual_overide_request is set to : " + String( result.toInt() ));
            delay(DEBUH_DELAY_TIME);
        }


        if( !result.toInt() ){
            digitalWrite( RELAY_2, HIGH );
            Serial.println("Manual Overide Irrigation - Pump OFF");
            break;
        }

        Serial.println( digitalRead(WL_LOW) ); 

        
        digitalWrite( RELAY_2, LOW );
        Serial.println("Manual Overide Irrigation - Pump ON");

        delay(1000);
    }
}



// void manual_irrigation_on(){
//     StaticJsonDocument<96> doc;
//     String result;
    
//     while( true ){
//         // {"irrigation_manual_overide_request":"0","sensor_data_request":"0"}
//         result = fetch_json( "db_unc_fetch_requests.php", "uid="+USER_ID );
//         deserializeJson(doc, result);

//         result = doc["irrigation_manual_overide_request"].as<String>();

//         if( DEBUG_CODE ){
//             Serial.println("Inside user request excution and irrigation_manual_overide_request is set to : " + String( result.toInt() ));
//             delay(DEBUH_DELAY_TIME);
//         }


//         if( !result.toInt() ){
//             digitalWrite( RELAY_2, HIGH );
//             Serial.println("Manual Overide Irrigation - Pump OFF");
//             break;
//         }

//         Serial.println( digitalRead(WL_LOW) ); 
         
//         if( digitalRead(WL_LOW) == 0 ){
//             Serial.println("\tTank Water Level Low");
//             digitalWrite( RELAY_2, HIGH );
//             pump_water_to_tank( false );
//         } else {
//             pinMode(WL_LOW, OUTPUT);
//             digitalWrite(WL_LOW, LOW);
//             pinMode(WL_LOW, INPUT);
//         }
       
        
//         digitalWrite( RELAY_2, LOW );
//         Serial.println("Manual Overide Irrigation - Pump ON");

//         delay(1000);
//     }
// }