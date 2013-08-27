#!/usr/bin/python
import RPi.GPIO as GPIO, time, os, pygame ## Import GPIO library
GPIO.setmode(GPIO.BOARD) ## Use board pin numbering
GPIO.setwarnings(False)
GPIO.setup(22, GPIO.OUT) ## Setup GPIO Pin 22 to OUT
GPIO.output(22,True) ## Turn on GPIO pin 22
time.sleep (1)
GPIO.output(22,False) ## Turn off GPIO pin 22

