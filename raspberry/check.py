import os
import time

while 1:
    os.system("sshpass -p 'PUSpus12345!' ssh -o StrictHostKeyChecking=no pus@104.40.254.210 'python /home/pus/public_html/pus/insert_time.py'")
    time.sleep(2)
