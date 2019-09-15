import os
import signal
import subprocess
import paho.mqtt.client as mqtt

def on_connect(client, userdata, flags, rc):
    print("Connected with result code "+str(rc))

    client.subscribe("PusProjekt/led1")
    client.subscribe("PusProjekt/led2")
    client.subscribe("PusProjekt/led3")
    client.subscribe("PusProjekt/led4")

def on_message(client, userdata, msg):
    print(msg.topic+" "+msg.payload)

    led_num=msg.topic.split('/')

    pgrep=os.popen("pgrep -af python").read()
    pgrep=pgrep.split("\n")
    for i in range(0, len(pgrep)):
        if led_num[1] in pgrep[i]:
            pid=pgrep[i].split(' ')
            pid=pid[0]
            print int(pid)
            os.kill(int(pid), signal.SIGKILL)

    print led_num[1]
    subprocess.Popen(["python", led_num[1]+"_skripta.py", msg.payload])
    print "python "+led_num[1]+"_skripta.py "+msg.payload #test ispisa


client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

client.connect("test.mosquitto.org", 1883, 60)

client.loop_forever()
