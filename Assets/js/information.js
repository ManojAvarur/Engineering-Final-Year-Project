/*
    irrigation_manual_overide -- x2
    temparature -- x2
    humidity -- x2
    moisture -- x2
*/
// During irrigation_manual_overide stop request_sensor_data
// During request_sensor_data stop irrigation_manual_overide
var interval_for_retrive_sensor_data;
var unset_new_data_recived_flag_information;

function unset_new_data_recived_flag(){
    clearInterval(unset_new_data_recived_flag_information)
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", 'handel_requests/userrequest/unset_new_data_recived_flag.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("uid="+user_id());

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if( this.status == 200 ){
                console.log("Unseting new data received flag");
                unfreeze_nodemcu('request_sensor_data');
            } else {
                alert( this.response );
                unset_new_data_recived_flag_information = setInterval(unset_new_data_recived_flag, 1000);
            }
        }
    };

}

function retrive_sensor_data(){
    clearInterval(interval_for_retrive_sensor_data);

    var sensor_result_display = document.getElementsByClassName("sensor_data_display");
    var sensor_data_cards = document.getElementsByClassName("sensor_data_retrival");
    var toggle_btn = document.getElementById("togBtn");
    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", 'handel_requests/userrequest/sensor_data_retrival.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("uid="+user_id());

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if( this.status == 200 && parseInt( JSON.parse( this.response ).new_data_recieved_flag ) ){
                var data = JSON.parse( this.response );
                sensor_result_display[0].innerHTML = data["temperature"]+"&nbsp;&#8451";
                sensor_result_display[1].innerHTML = data["humidity"]+"%";
                sensor_result_display[2].innerHTML = data["soil_moisture"]+"%";
                for( $i = 0; $i < sensor_data_cards.length; $i++ ){
                    sensor_data_cards[$i].onclick = () => { nodemcu_free_check( request_sensor_data, true, 'request_sensor_data' ) };
                }
                toggle_btn.disabled = false;
                toggle_btn.onclick = () => { nodemcu_free_check(irrigation_manual_overide, true, 'irrigation') };
                document.getElementById("togBtn-slider").style.backgroundColor = "#aa2e2e";
                unset_new_data_recived_flag_information = setInterval( unset_new_data_recived_flag, 1000);
            } else {
                interval_for_retrive_sensor_data = setInterval(retrive_sensor_data, 1000);
            }
        }
    };
}

function request_sensor_data(){
    var sensor_result_display = document.getElementsByClassName("sensor_data_display");
    var sensor_data_cards = document.getElementsByClassName("sensor_data_retrival");
    var toggle_btn = document.getElementById("togBtn");

    toggle_btn.disabled = true;

    for( $i = 0; $i < sensor_result_display.length; $i++ ){
        sensor_result_display[$i].innerHTML = "Loading...";
    }
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", 'handel_requests/userrequest/sensor_data_request.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("uid="+user_id());

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if( this.status == 200 && JSON.parse( this.response ).result ){
                interval_for_retrive_sensor_data = setInterval(retrive_sensor_data, 1000);
                document.getElementById("togBtn-slider").style.backgroundColor = "#525252";
                toggle_btn.onclick = () => { display_alert() };
                for( $i = 0; $i < sensor_data_cards.length; $i++ ){
                    sensor_data_cards[$i].onclick = null;
                }
                console.log("Setting sensor_data_request");
                
            } else {
                display_alert("Unable to process request. Please try again!");
                toggle_btn.disabled = false;
                toggle_btn.style.backgroundColor = "red";
            }
        }
    };
}

function irrigation_manual_overide(){
    var toggle_btn = document.getElementById("togBtn");
    var sensor_data_cards = document.getElementsByClassName("sensor_data_retrival");
    console.log("inside irrigation_manual_overide");

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", 'handel_requests/userrequest/irrigation_request.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("uid="+user_id()+"&toggle_status="+toggle_btn.checked);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if( this.status == 200 && JSON.parse( this.response ).result ){
                if( toggle_btn.checked ){
                    for( $i = 0; $i < sensor_data_cards.length; $i++ ){
                        sensor_data_cards[$i].onclick = () => { display_alert() };
                    }
                }
                console.log("irrigation_manual_overide is set to : " +toggle_btn.checked);
            } else {
                display_alert("Unable to process request. Please try again!");
                cancel_switch_event( toggle_btn );
            }
        }
    };

    if( !toggle_btn.checked ){
        for( $i = 0; $i < sensor_data_cards.length; $i++ ){
            sensor_data_cards[$i].onclick = () => { nodemcu_free_check( request_sensor_data, true, 'request_sensor_data' ) };
        }
        unfreeze_nodemcu('irrigation');
    }
    
}

function unfreeze_nodemcu( from_func ){
    var count = 0;
    var xhttp = new XMLHttpRequest();
    var unfreeze = document.getElementsByClassName("unfreeze");
    xhttp.open("POST", 'handel_requests/userrequest/unfreeze_nodemcu.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("uid="+user_id());

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4){
            if(this.status == 200){
                if( JSON.parse(this.response).result ){
                    console.log("unfreezing NodeMCU");
                    if( from_func == 'irrigation'){
                        document.getElementById("togBtn").onclick = () => { nodemcu_free_check(irrigation_manual_overide, true, 'irrigation') };
                    }
                    if( unfreeze[0].style.display == "list-item" ){
                        unfreeze[0].style.display = "none";
                        for( $i = 1; $i < unfreeze.length; $i++){
                            unfreeze[$i].style.display = "none";
                            unfreeze[$i].onclick = null;
                        }
                    }
                } else {
                    display_alert("Unable to process request. Please try again!");
                    unfreeze[0].style.display = "list-item";
                    for( $i = 1; $i < unfreeze.length; $i++){
                        unfreeze[$i].style.display = "list-item";
                        unfreeze[$i].onclick = () => { unfreeze_nodemcu('header') };
                    }
                }
            } else {
                display_alert("Unable to process request. Please try again!");
                unfreeze[0].style.display = "list-item";
                for( $i = 1; $i < unfreeze.length; $i++){
                    unfreeze[$i].style.display = "list-item";
                    unfreeze[$i].onclick = () => { unfreeze_nodemcu('header') };
                }
            }
        }
    }
}

function nodemcu_free_check( call_back_function, execute_nodemcu_free_check, from_func ){
    var toggle_btn = document.getElementById("togBtn");
    if( execute_nodemcu_free_check ){
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", 'handel_requests/userrequest/freeze_nodemcu.php');
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("uid="+user_id());

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if(this.status == 200){
                    if( JSON.parse(this.response).result ){
                        console.log("NodeMCU free");
                        if( from_func == 'irrigation' ){
                            toggle_btn.onclick = () => { nodemcu_free_check(irrigation_manual_overide, false, 'irrigation') };
                        }
                        call_back_function();
                    } else {
                        if( from_func == 'irrigation' ){
                            cancel_switch_event( toggle_btn );
                        }
                        display_alert();
                    }
                } else {
                    if( from_func == 'irrigation' ){
                        cancel_switch_event( toggle_btn );
                    }
                    display_alert("Unable to process request. Please try again!");
                }
            }
        }
    } else {
        call_back_function();
    }
}

function pageleave(){
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", 'handel_requests/userrequest/user_left.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send( "uid="+user_id() );    
}


function display_alert( alert_message = "NodeMCU is under execution. Please try after some time!" ){
    document.getElementById("alert-msg").innerHTML = alert_message;
    document.getElementById("alert").style.display = "block";
    document.getElementById("sensor-datass").scrollIntoView();
}



function pump_status_color_update(){
    var status_id = document.getElementById("pump-status");
    if( status_id.innerHTML == "ON"){
        status_id.style.color = "#689F38";
    } else {
        status_id.style.color = "rgb(162, 27, 27)";
    }
}

const sleep = (milliseconds) => {
    return new Promise(resolve => setTimeout(resolve, milliseconds))
}

function cancel_switch_event( toggle_btn ){
    if( toggle_btn.checked ){
        toggle_btn.checked = false;
    } else {
        toggle_btn.checked = true;
    }
}

window.onbeforeunload = function(){
    pageleave();
    return 'Are you sure you want to leave?';
  };

window.onload = pump_status_color_update;