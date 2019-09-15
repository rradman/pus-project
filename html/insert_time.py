#!/usr/bin/python

import time
import sys
import MySQLdb
from subprocess import call

#spajanje sa bazom
db = MySQLdb.connect("localhost","root","root","pus_baza" )
cursor = db.cursor()

sql = "Truncate table rpi_time" #isprazni bazu
cursor.execute(sql)

trenutno_vrijeme = int(time.time())

cursor.execute("""INSERT INTO rpi_time (rpi_timestamp) VALUES (%s)""", (trenutno_vrijeme,))
db.commit()

cursor.close()
db.close()
