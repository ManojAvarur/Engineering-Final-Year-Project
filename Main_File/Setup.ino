void setup() {
    Serial.begin(9600);

    // Setting Up Wifi
    setup_wifi();

    //Settings for DHT Sensor
    dht.begin();

    // Settings for Soil irrigating Relay
    pinMode(RELAY_2, OUTPUT);
    digitalWrite(RELAY_2, HIGH);

    // Settings for Water Level Sensor
    pinMode(RELAY_1, OUTPUT);
    pinMode(WL_LOW, INPUT);
    pinMode(WL_HIGH, INPUT);

    digitalWrite(RELAY_1, HIGH);
    digitalWrite(WL_LOW, LOW);
    digitalWrite(WL_HIGH, LOW);
}