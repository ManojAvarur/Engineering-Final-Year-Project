#define RELAY_2 D2

int SOIL_PIN = A0;
static int MOISTURE_VALUE;
static int PERCENTAGE;

int MAP_LOW = 1024;
int MAP_HIGH = 40;

void irrigate_soil();
bool soil_percentage_for_irrigation();
