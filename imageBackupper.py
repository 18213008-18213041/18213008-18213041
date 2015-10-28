# Name/NIM	: Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
# Day, Date	: Tuesday, 27 October 2015
# File		: imageBackupper.py

# Library
import urllib
import urllib2
import os
import sys
from bs4 import BeautifulSoup

# Function
def confirmAction():
	choice = raw_input("Continue? Yes/No\n")
	global exitCondition
	if (choice == "Yes"):
		exitCondition = 0
		return exitCondition
	else:
		if (choice == "No"):
			exitCondition = 1
			return exitCondition
		else:
			print "Please answer with Yes or No."
			confirmAction()

# Algorithm
# Selecting Webpage
exitCondition = 1
while (exitCondition != 0):
	sys.stdout.write("Target webpage : ")
	url = sys.stdin.readline()
	url = url.rstrip('\n')
	confirmAction()

# Opening Webpage
resp = urllib2.urlopen(url)
soup = BeautifulSoup(resp.read())

# Parsing Webpage to Get Images
counter = 1

for anchor in soup.findAll('img', src = True):
	link = anchor['src']
	if (str(link).endswith('.jpg')):
		print link
		filename = str(counter) + ".jpg"
		urllib.urlretrieve(link, filename)
		counter = counter + 1

# Backupping Images 
print os.system("rsync -a --progress --include '*/' --include '*.jpg' --exclude '*' /home/nicolosi/Desktop/ /home/nicolosi/Documents")
