#!/usr/bin/env python
import sys
import paho.mqtt.publish as publish

publish.single("PusProjekt/led"+sys.argv[1], sys.argv[2], hostname="test.mosquitto.org")

print("Done")
