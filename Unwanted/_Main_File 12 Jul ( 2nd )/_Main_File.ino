// ------------------ Main Declaration --------------
String URL = "http://192.168.2.4/handel_requests";
String USER_ID = "ccac34d923330a2968f12e163d5a2cd6";

float TEMPERATURE_THRESHOLD_VALUE = 25.00;
float HUMIDITY_THRESHOLD_VALUE = 48.00;
float PERCENTAGE_THRESHOLD_VALUE = 40;

unsigned long START_MILLIS; 
unsigned long CURRENT_MILLIS;
unsigned long TIME_TO_IRRIGATE = 10000; // 10 sec

int IRRIGARTION_ON_OFF_STATUS;
int PUMP_ON_OFF_STATUS;

// ------------------ Wi-Fi Settings ------------------
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "Manoj";
const char* password = "Hazelnut+-";
WiFiClient client;


// ------------------ DHT11 Sensor Settings -----------
#include "DHT.h"
#define DHTTYPE DHT11
#define dpin D0

DHT dht(dpin, DHTTYPE);
float HUMIDITY;
float TEMPERATURE;

// ------------------ Relay Sensor Settings -----------
#define RELAY_1 D1 // For Water Pump
#define RELAY_2 D2 // For Irrigation

// ------------------ Soil Sensor Settings ------------
int SOIL_PIN = A0;
static int MOISTURE_VALUE;
static int PERCENTAGE;

int MAP_LOW = 1024;
int MAP_HIGH = 40;

    /* USING RELAY_2 */

// ------------------ Water Level Sensor Settings ------
#define WL_LOW D6 // LOW
#define WL_HIGH D7 // HIGH

    /* USING RELAY_1 */

// ----------------- Json Libraies Settings ------------
#include <ArduinoJson.h>
StaticJsonDocument<48> Json_result_responce;

// ---------------- Function Declarations -------------
int nodemcu_freeze_check();
int user_request_execution();
void manual_irrigation_on();
void send_sensor_data();
// void unfreeze_nodemcu();
void automatic_execution();
void irrigate_soil();
void update_database();
void unfreeze_user();
int user_freeze_flag();
void pump_water_to_tank( bool change_time );
void send_json_sensor_data( String location, String JsonData );
String fetch_json( String location, String variables );
void setup_wifi();
