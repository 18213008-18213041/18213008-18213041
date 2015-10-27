# Name/NIM	: Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
# Day, Date	: Tuesday, 27 October 2015
# File		: imageBackupper.py

import urllib
import urllib2
import os
import sys

from bs4 import BeautifulSoup

sys.stdout.write("Target webpage : ")
url = sys.stdin.readline()
url = url.rstrip('\n')

resp = urllib2.urlopen(url)
soup = BeautifulSoup(resp.read())

counter = 1

for anchor in soup.findAll('img', src = True):
	link = anchor['src']
	if (str(link).endswith('.jpg')):
		print link
		filename = str(counter) + ".jpg"
		urllib.urlretrieve(link, filename)
		counter = counter + 1

print os.system("rsync -a --progress --include '*/' --include '*.jpg' --exclude '*' /home/nicolosi/Desktop /home/nicolosi/Documents")
