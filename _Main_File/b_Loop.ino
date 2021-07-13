void loop(){
    if( nodemcu_freeze_check() ){
        user_request_execution();
    } else {
        automatic_execution();
    }
    delay(1000);
}

// Upload automatic_execution() data to database
