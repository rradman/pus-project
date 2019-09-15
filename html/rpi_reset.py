#!/usr/bin/python

import MySQLdb
from subprocess import call

#spajanje sa bazom
db = MySQLdb.connect("localhost","root","root","pus_baza" )
cursor = db.cursor()

#LED 1
sql = "SELECT fade FROM led1 \
	ORDER BY DATETIME DESC LIMIT 1"		#SQL upit koji dohvaca posljednji uneseni DC iz baze
cursor.execute(sql)						#izvrsavanje upita
results = cursor.fetchall()				#dohvacanje rezultata i spremanje u results
for row in results:
	   data = row[0]					#spremi prvi element u "data"
call(["python", "/home/pus/public_html/pus/publish.py", "1", str(data)])		#poziv funkcije "publish.py" s DC-om iz baze


#LED 2
sql = "SELECT fade FROM led2 \
	ORDER BY DATETIME DESC LIMIT 1"		#SQL upit koji dohvaca posljednji uneseni DC iz baze
cursor.execute(sql)						#izvrsavanje upita			
results = cursor.fetchall()				#dohvacanje rezultata i spremanje u results
for row in results:
	   data = row[0]					#spremi prvi element u "data"
call(["python", "/home/pus/public_html/pus/publish.py", "2", str(data)])		#poziv funkcije "publish.py" s DC-om iz baze


#LED 3
sql = "SELECT fade FROM led3 \
	ORDER BY DATETIME DESC LIMIT 1"		#SQL upit koji dohvaca posljednji uneseni DC iz baze
cursor.execute(sql)						#izvrsavanje upita
results = cursor.fetchall()				#dohvacanje rezultata i spremanje u results
for row in results:
	   data = row[0]					#spremi prvi element u "data"
call(["python", "/home/pus/public_html/pus/publish.py", "3", str(data)])		#poziv funkcije "publish.py" s DC-om iz baze


#LED 4
sql = "SELECT fade FROM led4 \
	ORDER BY DATETIME DESC LIMIT 1"		#SQL upit koji dohvaca posljednji uneseni DC iz baze
cursor.execute(sql)						#izvrsavanje upita
results = cursor.fetchall()				#dohvacanje rezultata i spremanje u results
for row in results:
	   data = row[0]					#spremi prvi element u "data"
call(["python", "/home/pus/public_html/pus/publish.py", "4", str(data)])		#poziv funkcije "publish.py" s DC-om iz baze

cursor.close()
db.close()
