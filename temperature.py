import RPi.GPIO as GPIO, time, os, pygame

heatingon = 0
currentpritemp = 0

while True:
	
	import urllib2
	ur = urllib2.urlopen("https://wakai.ninja.is/rest/v0/device/0813BB000904_0101_0_31/?user_access_token=gFwlNOoFnGOa1L0isDlnNyOkM72GSsFQnbcIEkQSIWU").read(1000)
	tmpar = ur.split(':')
	tmpval = tmpar[26].split(',')
	currenttemp =  tmpval[0]
	print currenttemp 
	f = open('dial/togglefiles/currenttemp.txt','w')
	f.write(currenttemp)
	f.close()
	
	ur2 = urllib2.urlopen("http://192.168.0.131").read(1000)
	currenttemp2 =  ur2 
	print currenttemp2
	f = open('dial/togglefiles/currenttemp2.txt','w')
	f.write(currenttemp2)
	f.close()

	fo = open("dial/newtemp.txt", "rw+")
	line = fo.readline()
	print line
	fo.close()
	
	sta = open("dial//togglefiles/status.txt", "rw+")
	stat = sta.readline()
	sta.close()
	
	sta2 = open("dial//togglefiles/priority.txt", "rw+")
	prio = sta2.readline()
	sta.close()
	
	if prio == 0:
		currentpritemp = currenttemp
	if prio == 1:
		currentpritemp = currenttemp2
	
	if line > currentpritemp:
		if heatingon == 0:
			GPIO.setmode(GPIO.BOARD) 
			GPIO.setwarnings(False)
			GPIO.setup(22, GPIO.OUT) 
			GPIO.output(22,True) 
			time.sleep (1)
			GPIO.output(22,False) 
			heatingon = 1
			print "heating on 1"
	else:
			GPIO.setmode(GPIO.BOARD) 
			GPIO.setwarnings(False)
			GPIO.setup(22, GPIO.OUT) 
			GPIO.output(22,True) 
			time.sleep (1)
			GPIO.output(22,False) 
			heatingon = 0
			print "heating on 0"
			

	time.sleep(20)
