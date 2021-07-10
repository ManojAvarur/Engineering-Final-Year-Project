void loop(){
    if( nodemacu_freeze_check() ){
        user_request_execution();
    } else {
        automatic_execution();
    }
}