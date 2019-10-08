#include <Ethernet.h>
#include <SPI.h>
byte mac[] = {
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED
};
//Arduino IP
IPAddress ip(192, 168, 1, 10);

const int bufferLen = 200;

//Digital Pin 3
int sensorPin = 3;
int currentValue = 0;
int triggerMode = 1 ;
byte waitingMode = 0;
byte debugMode = 0;

char server[] = "77.104.168.74"; //server address is here
EthernetClient client;
void setup() {
  // put your setup code here, to run once:
  // Serial.begin starts the serial connection between computer and Arduino
  Serial.begin(9600);

  // start the Ethernet connection:
  Serial.println("Initialize Ethernet with DHCP:");
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    if (Ethernet.hardwareStatus() == EthernetNoHardware) {
      Serial.println("Ethernet shield was not found.  Sorry, can't run without hardware. :(");
    } else if (Ethernet.linkStatus() == LinkOFF) {
      Serial.println("Ethernet cable is not connected.");
    }
    // no point in carrying on, so do nothing forevermore:
    while (true) {
      delay(1);
    }
  }
  // start the Ethernet connection and the server:
  //Ethernet.begin(mac); //unocmment this line for DHCP

  Serial.println("Starting...");
  Serial.println(Ethernet.localIP());
  pinMode(sensorPin, INPUT);
}

void loop() {
  if (waitingMode) {
    receiveData();
  } else {
    sendData();
  }
}

void receiveData() {
  int len = client.available();
  if (len > 0) {
    byte buffer[bufferLen];
    if (len > bufferLen) len = bufferLen;
    client.read(buffer, len);
    if (debugMode) {
      Serial.println();
      Serial.println();
      Serial.write(buffer, len); // show in the serial monitor (slows some boards)
      Serial.println();
      Serial.println();
    }
    waitingMode = 0;
    client.stop();    // Closing connection to server
    //delay(10000);
    Serial.println("Sensor is Ready for next trigger!");
  }
}

void sendData() {
  int sensorValue = digitalRead(sensorPin);
  if (currentValue == sensorValue) {
    return;
  }
  currentValue = sensorValue;

  if (sensorValue == 0) {
    return;
  }
  if (triggerMode == 1 )
  {
    triggerMode = 0;
  } else {
    triggerMode = 1;
  }


  if (client.connect(server, 80)) {
    client.print("GET /admin_dashboard/write_data.php?value="); // This
    client.print(triggerMode);
    client.println(" HTTP/1.1"); // Part of the GET request
    client.println("Host: www.smartp.ictatjcub.com"); // webserver Host
    client.println("Connection: close");
    client.println(); // Empty line
    client.println(); // Empty line
    Serial.print("Sensor value has been sent to server :" );
    Serial.println(triggerMode); // Part of the GET request
    waitingMode = 1 ; // waiting for webserver
  }
  else {
    // If Arduino can't connect to the server (your computer or web page)
    Serial.println("--> connection failed\n");
  }
}
