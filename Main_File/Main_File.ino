// ------------------ DHT11 Sensor ------------------
#include "DHT.h"
#define DHTTYPE DHT11
#define dpin D0

DHT dht(dpin,DHTTYPE);

// ------------------ Relay Sensor ------------------
#define RELAY_1 D1
#define RELAY_2 D2

// ------------------ Soil Sensor ------------------
int SOIL_PIN = A0;
int MOISTURE_VALUE;
int PERCENTAGE;

int MAP_LOW = 1024;
int MAP_HIGH = 40;

    /* USING RELAY_2 */

// ------------------ Water Level Sensor -------------
#define WL_LOW D6 // LOW
#define WL_HIGH D7 // HIGH

    /* USING RELAY_1 */
    