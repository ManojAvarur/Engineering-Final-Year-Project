window.onload = pump_status_color_update;

function pump_status_color_update(){
    var status_id = document.getElementById("pump-status");
    if( status_id.innerHTML == "ON"){
        status_id.style.color = "#689F38";
    } else {
        status_id.style.color = "red";
    }
}