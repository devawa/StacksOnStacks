#include <string.h>
#include <SoftwareSerial.h>
#include <Servo.h>

SoftwareSerial BLESerial(0,1);

String userName [6] = {"ntiko", "linda", "brian", "abhi", "ian", "akua"};
String userId [6] = {"u1","u2","u3","u4","u5","u6"};

// variable to store the initial values
int pos = 20;   //Servo initial position
int green = 2;  //Green LED is on pin 2
int red = 3;    //Red LED is on pin 3

// create servo object to control a servo
Servo myservo;

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);     // initialize serial
  // wait for serial port to connect. Needed for native USB port only
  while (!Serial) { };
  BLESerial.begin(9600);
  
  pinMode(green, OUTPUT);
  pinMode(red, OUTPUT);

  // attaches the servo on pin 7 to the servo object
  myservo.attach(7);
}

void loop() {
  // put your main code here, to run repeatedly:
  int nameNo;
  bool found = false;

  digitalWrite(red, HIGH);
  myservo.write(pos);
  
  
  Serial.println("Please enter your username or ID: ");

  //wait for user input
  while (BLESerial.available() == 0);

  //read input
  String id = BLESerial.readString();
  id.trim(); //get rid of return character at the end

  for (int i = 0; i < 5; i++){
    if (id == userId[i] || id == userName[i]){
      found = true;
      nameNo = i;
    }
  }

  if (found){
    Serial.println("hello " +userName[nameNo]);
    sendNotification(userName[nameNo]);
    digitalWrite(red, LOW);
    digitalWrite(green, HIGH);

    for (pos; pos <= 100; pos++){
      myservo.write(pos);
      delay(15);
    }
    delay(2000);

    for (pos = 100; pos >= 20; pos--){
        myservo.write(pos);
        delay(15);
    }
    digitalWrite(green,LOW);
    
  }
  else {
    Serial.println("invalid username");
    digitalWrite(green, LOW);
    digitalWrite(red, HIGH);
    delay(200);
    digitalWrite(red, LOW);
    delay(200);
    digitalWrite(red, HIGH);
    delay(200);
    digitalWrite(red, LOW);
    delay(200);
    digitalWrite(red, HIGH);
    delay(200);
    digitalWrite(red, LOW);
    delay(200);
    digitalWrite(red, HIGH);
  }
  
}

// This function is going to send notification to the user
void sendNotification(String val){
  
}
