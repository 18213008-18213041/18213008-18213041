# Name/NIM	: Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
# Day, Date	: Tuesday, 27 October 2015
# File		: imageBackupper.sh

#!/bin/bash

wget -r --reject="robots.txt" --reject="index.html" --reject="index1.html" -P /home/nicolosi/Documents -A jpg -nd http://www.detik.com
rsync -avz -e --progress --include '*/' --include '*.jpg' --exclude '*' /home/nicolosi/Documents /home/nicolosi/ImageBackup
