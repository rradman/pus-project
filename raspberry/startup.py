import os
import time
import urllib2
import subprocess

def internet_on():
    while True:
        try:
            response=urllib2.urlopen('http://google.com')
            return True
        except urllib2.URLError as err: pass
    return False

def start_listening():
    time.sleep(1)
    subprocess.Popen(["python", "/home/pi/client.py"])
    time.sleep(5)
    os.system("sshpass -p 'PUSpus12345!' ssh -o StrictHostKeyChecking=no pus@104.40.254.210 'python /home/pus/public_html/pus/rpi_reset.py'")
    time.sleep(2)
    subprocess.Popen(["python", "/home/pi/check.py"])

if internet_on():
    start_listening()
else:
    print "Can't connect to network!"
