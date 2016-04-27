// Library
#include <MFRC522.h>
#include <SoftwareSerial.h>
#include <Stdlib.h>
#include <SPI.h>

// RFID Variable
#define RST_PIN 9
#define SS_PIN 10
MFRC522 rfid(SS_PIN, RST_PIN);
MFRC522::MIFARE_Key key;
byte nuidPICC[3];
int successRead;
char setID[50];

// Wifi Variable
#define DEBUG true
String ssid = "andrawifi";
String password = "20160128";
SoftwareSerial esp(6,7);

// Connection Variable
String data;
String server = "192.168.88.13";
String uri = "/imka/server.php";

void setup() {
  // put your setup code here, to run once:
  delay(5000);
  Serial.begin(115200);

  // setup Wifi
  esp.begin(115200);
  connectWifi();
  Serial.print("TCP/UDP Connection...\n");
  sendCommand("AT+CIPMUX=0\r\n",2000,DEBUG);
  delay(5000);

  // setup RFID
  SPI.begin();
  rfid.PCD_Init();

  // id limitation
  for(byte i = 0; i < 6; i++) {
    key.keyByte[i] = 0xFF;
  }
}

void loop() {
  // put your main code here, to run repeatedly:
  Serial.println("\nInput Kartu:");
  do {
    successRead = getID();
  } while(!successRead);
  sprintf(setID, "%02x%02x%02x%02x", nuidPICC[0], nuidPICC[1], nuidPICC[2], nuidPICC[3]);
  sendDataID(setID);
  delay(5000);
}

int getID() {
   if(!rfid.PICC_IsNewCardPresent()) { 
     return 0; 
   }
   if(!rfid.PICC_ReadCardSerial()) { 
     return 0; 
   }

   Serial.println(F("Scanned PICC's UID:")); 
   for (int i = 0; i < 4; i++) {  // 
     nuidPICC[i] = rfid.uid.uidByte[i];
     Serial.print(nuidPICC[i], HEX);
   } 
   Serial.println(""); 
   rfid.PICC_HaltA();
   return 1; 
}

void sendDataID(String id) {
  String cmd = "AT+CIPSTART=\"TCP\",\"";
  
  cmd += server;
  cmd += "\",80\r\n";
  sendCommand(cmd,1000,DEBUG);
  delay(5000);
  
  String cmd2 = "GET " + uri + "?rfid=\"";
  cmd2 += id;  
  cmd2 += "\" HTTP/1.0\r\n";
  cmd2 += "Host: " + server + "\r\n\r\n\r\n";
  String pjg="AT+CIPSEND=";
  pjg += cmd2.length();
  pjg += "\r\n";

  Serial.println(cmd2);
  sendCommand(pjg,1000,DEBUG);
  delay(500);
  sendCommand(cmd2,1000,DEBUG);
  delay(5000);
}

String sendCommand(String command, const int timeout, boolean debug) {
  String response = "";
      
  esp.print(command);
      
  long int time = millis();
      
  while( (time+timeout) > millis()) {
    while(esp.available()) {
      char c = esp.read();
      response+=c;
    }  
  }
      
  if(debug) {
    Serial.print(response);
  }
      
  return response;
}

void connectWifi() {
  //Set-wifi
  Serial.print("Restart Module...\n");
  sendCommand("AT+RST\r\n",2000,DEBUG);
  delay(5000);
  Serial.print("Set wifi mode : STA...\n");
  sendCommand("AT+CWMODE=1\r\n",1000,DEBUG);
  delay(5000);
  Serial.print("Connect to access point...\n");
  sendCommand("AT+CWJAP=\"andrawifi\",\"20160128\"\r\n",3000,DEBUG);
  delay(5000);
  Serial.print("Check IP Address...\n");
  sendCommand("AT+CIFSR\r\n",1000,DEBUG);
  delay(5000);
}
