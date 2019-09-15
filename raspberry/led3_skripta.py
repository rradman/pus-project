#!/usr/bin/python

import sys
import RPi.GPIO as GPIO
import time

#ugasi upozorenja
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

#inicijalizacija pinova kao izlaznih
GPIO.setup(27, GPIO.OUT)

ledica = GPIO.PWM(27, 100)		#stvori objekt ledica1 za PWM na pinu 23 frekvencije 100 Hz

#podesavanje pocetnog DC-a
ledica.start(1)

#promijeni DC
while 1:
    ledica.ChangeDutyCycle(float(sys.argv[1]))
    time.sleep(10)
