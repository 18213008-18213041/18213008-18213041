# Name/NIM	: Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
# Day, Date	: Wednesday, 16 September 2015
# File		: Serverv2.py

import SocketServer, threading, sys, os

class MyTCPHandler(SocketServer.BaseRequestHandler):
	def handle(self):
		print str(self.client_address[0]) + " connected"

		menu = "\n"
		filename = ""
		counter = 0

		for file in os.listdir("Text"):
    			if(file.endswith(".txt")):
				counter = counter + 1
				menu = menu + str(counter) + ". " + file + "\n"
				filename = filename + file + "\n"
		self.request.send(menu.rstrip("\n"))
		menu = menu.split()
	
		while 1:
			self.msg = self.request.recv(1024)
			if(not self.msg):
				break
			if(self.msg == "@bye"):
				print str(self.client_address[0]) + " disconnected"  
				break
			print str(self.client_address[0]) + " wrote: " + self.msg
			
			if(self.msg.isdigit()):
				if(int(self.msg) <= counter) and (int(self.msg) >= 1):
					file = open("Text/" + menu[(int(self.msg) * 2) - 1], "r")
					self.request.send(file.read().rstrip('\n'))
				else:
					self.request.send("text unavailable")
			else:
				self.request.send("please input number!")

if __name__ == "__main__":
	if(len(sys.argv) < 3):
		print "Usage : phyton server.py localhost port"
		sys.exit()
	host = sys.argv[1]
	port = int(sys.argv[2])
	server = SocketServer.TCPServer((host, port), MyTCPHandler)
	server.serve_forever()
