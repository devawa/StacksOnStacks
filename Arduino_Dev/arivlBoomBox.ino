#include <SoftwareSerial.h>
#include "Arduino.h"
#include <Servo.h>
/*
Author: StacksOnStacks
Description: Belonging to the ArivlBox, this Arduino code communicates with the ArivlApp and sends a signal to the Boom gate to open when access is granted.
Version number: 2.1
Module: ArivlBox
*/

SoftwareSerial BTserial (8,7); //create BTserial object
Servo myservo;  // create servo object to control a servo
int pos; //position varialble to control serovo
char c =' '; //char to at as buffer
boolean NL = true; //new line variable
 

/*
Purpose: This initiates up the functioning of the ArivlBox module.
Parameter: N/A
Return: N/A
*/
void setup() 
{
    myservo.attach(9);  // attaches the servo on pin 9 to the servo object
    
    Serial.begin(9600);
    Serial.print("Sketch:   ");   Serial.println(__FILE__);
    Serial.print("Uploaded: ");   Serial.println(__DATE__);
    Serial.println(" ");
 
    BTserial.begin(9600);  
    Serial.println("BTserial started at 9600");
}
 


/*
Purpose: This function connects to the ArivlApp and sends a signal to open the gate.
Parameter: N/A
Return: N/A
*/

void loop()
{
    // Read from the Bluetooth module and send to the Arduino Serial Monitor
    if (BTserial.available())
    {
      
        c = BTserial.read();
        
         if(c == 'o'){
            for (int pos = 0; pos <= 90; pos += 1) { // goes from 0 degrees to 180 degrees
             // in steps of 1 degree
              myservo.write(pos);              // tell servo to go to position in variable 'pos'
              delay(15);                      // waits 15ms for the servo to reach the position  
           }
          
           delay(2000);
          
           for (int pos = 90; pos >= 0; pos -= 1) { // goes from 180 degrees to 0 degrees
           myservo.write(pos);              // tell servo to go to position in variable 'pos'
           delay(15);                       // waits 15ms for the servo to reach the position
           }           

          }
        
        Serial.write(c);
    }
 
 
    // Read from the Serial Monitor and send to the Bluetooth module
    if (Serial.available())
    {
        c = Serial.read();
        
      // send to the Bluetooth module 
         if (c!=10 & c!=13 ) 
        {
           BTserial.write(c);
        }
        // Echo the user input to the main window. 
                // If there is a new line print the ">" character.
        if (NL) { Serial.print("\r\n>");  NL = false; }
        Serial.write(c);
        if (c==10) { NL = true; }
    }
}
