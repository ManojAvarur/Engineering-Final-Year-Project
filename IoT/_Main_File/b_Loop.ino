void loop(){
    if( nodemcu_freeze_check("Main Loop").equals("1") ){
        user_request_execution();
    } else {
        automatic_execution();
    }
    delay(1000);
}

// Upload automatic_execution() data to database
