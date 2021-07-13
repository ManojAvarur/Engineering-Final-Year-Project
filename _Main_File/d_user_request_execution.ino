int user_request_execution(){
    
    String result;
    while( true ){
        // {"irrigation_manual_overide_request":"0","sensor_data_request":"0"}
        result = fetch_json("db_unc_fetch_requests.php", "uid="+USER_ID );

        deserializeJson(User_request_check, result);
    
        result = User_request_check["irrigation_manual_overide_request"].as<String>();

        if( DEBUG_CODE ){
            Serial.print("Inside user request excution and irrigation_manual_overide_request is set to : " );
            Serial.println( result.toInt() );
            delay(DEBUH_DELAY_TIME);
        }

        if( result.toInt() ){
            manual_irrigation_on();
            // continue;
        }

        result = User_request_check["sensor_data_request"].as<String>();

        if( DEBUG_CODE ){
            Serial.print("Inside user request excution and sensor_data_request is set to : ");
            Serial.print(result.toInt() );
        }

        if( result.toInt() ) {
            send_sensor_data();
        }
        
        delay(1000);

        if(  nodemcu_freeze_check() ){

            if( DEBUG_CODE ){
                Serial.print("Inside user request excution and nodemcu_freeze_check is set to : true so the loop will break now ");
            }

            break;
        }
        
    }
}




// int user_request_execution(){

//     bool user_request_execution_function_repeat;

//     do{
//         user_request_execution_function_repeat = 0;
//         // {"irrigation_manual_overide_request":"0","sensor_data_request":"0"}
//         String result = fetch_json("db_unc_fetch_requests.php", "uid="+USER_ID );

//         StaticJsonDocument<96> doc;
//         deserializeJson(doc, result);

    
//         if( doc["irrigation_manual_overide_request"].toInt() ){
//             manual_irrigation_on();
//             user_request_execution_function_repeat = unfreeze_nodemcu();
//             if( !user_request_execution_function_repeat ){
//                 break;
//             }
            
//         } 

//         if( doc["sensor_data_request"].toInt() ) {
//             send_sensor_data();
//             user_request_execution_function_repeat = unfreeze_nodemcu();
//             if( !user_request_execution_function_repeat ){
//                 break;
//             }
//         }
//     }while( user_request_execution_function_repeat );
// }

