import urllib2

ur = urllib2.urlopen("https://wakai.ninja.is/rest/v0/device/0813BB000904_0101_0_31/?user_access_token=gFwlNOoFnGOa1L0isDlnNyOkM72GSsFQnbcIEkQSIWU").read(1000)
tmpar = ur.split(':')
tmpval = tmpar[26].split(',')
print tmpval[0]

secondtmp = urllib2.urlopen("http://192.168.0.131").read(1000)
print secondtmp


# Open a file in write mode
fo = open("temp.txt", "rw+")
str = tmpval[0]
# Write a line at the end of the file.
fo.seek(0, 0)
line = fo.write( str )
# Close opend file
fo.close()

# Open a file in write mode
fo = open("temp1.txt", "rw+")
str = secondtmp
# Write a line at the end of the file.
fo.seek(0, 0)
line = fo.write( str )
# Close opend file
fo.close() 