#include <SoftwareSerial.h>  
#define SSID "andrawifi"    // SSID
#define PASS "20160128"                // Password
#define HOST "192.168.88.13"  // Webhost
#define DEBUG true

float temp;
int tempPin = A0;
SoftwareSerial Serial1(2,3);

void setup() {
  // put your setup code here, to run once:
  delay(5000);
  //connectWifi();
  Serial.begin(115200);
}

void loop() {
  // put your main code here, to run repeatedly:
  sendCommand("AT+GMR",3000,DEBUG);
/*  temp = analogRead(tempPin);
  temp = temp * 0.48828125;
  sendData(temp);
  delay(3000);
  Serial.print("Temperature: ");
  Serial.print(temp);
  Serial.print(" *C");
  Serial.println(); */
}

void connectWifi() {
  //Set-wifi
/*  sendCommand("AT+RST\r\n",2000,DEBUG); // reset module
  sendCommand("AT+CWMODE=1\r\n",1000,DEBUG); // configure as access point
  sendCommand("AT+CWJAP=\"andrawifi\",\"20160128\"\r\n",3000,DEBUG);
  delay(5000);
  sendCommand("AT+CIFSR\r\n",1000,DEBUG); // get ip address
  delay(2000); */
  sendCommand("AT+CIPSTART=\"TCP\",\"www.google.com\",80\r\n",3000,DEBUG);
}

void sendData(float temp) {
  String cmd = "AT+CIPSTART=\"TCP\",\"";
  cmd += HOST;
  cmd += "\",80\r\n";
  sendCommand(cmd,1000,DEBUG);
  delay(2000);

  String cmd2 = "GET /imka/server.php?temperature="; // Link ke skrip PHP                    
  cmd2 += temp;          // Nilai Temperatur
  cmd2 += " HTTP/1.0\r\n";
  // cmd2 += "Host: 192.168.88.13\r\n\r\n\r\n"; // Host
  String pjg="AT+CIPSEND=";
  pjg += cmd2.length();
  pjg += "\r\n";

  sendCommand(pjg,1000,DEBUG);
  String result = sendCommand(cmd2,1000,DEBUG);
  delay(2000);
}

String sendCommand(String command, const int timeout, boolean debug)
{
  String response = "";
  Serial1.print(command); // send the read character to the esp8266
  long int time = millis();
  while( (time+timeout) > millis()) {
    while(Serial1.available()) {
      // The esp has data so display its output to the serial window 
      char c = Serial1.read(); // read the next character.
      response+=c;
    }  
  }
  if(debug) {
    Serial.print(response);
  }
  return response;
}
