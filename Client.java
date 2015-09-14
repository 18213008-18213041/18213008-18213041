// Name/NIM		: Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
// Date			: 9 September 2015
// Source		: pirate.shu.edu/~wachsmut/Teaching/CSAS2214/Virtual/Lectures/chat-client-server.html

/* LIBRARY */
import java.net.*;
import java.io.*;

public class Client {
	/* ATTRIBUTE */
	private Socket socket = null;
	private DataInputStream console = null;
	private DataOutputStream streamOut = null;	

	/* CONSTRUCTOR */
	public Client(String serverName, int serverPort) {
		System.out.println("Establishing connection. Please waait ...");
		try {
			socket = new Socket(serverName, serverPort);
			System.out.println("Connected: " + socket);
			start();
		}
		catch(UnknownHostException uhe) {
			System.out.println("Host unknown: " + uhe.getMessage());
		}
		catch(IOException ioe) {
			System.out.println("Unexpected exception: " + ioe.getMessage());
		}
		System.out.println("To end the connection, write '@bye'");
		String line = "";
		while(!line.equals("@bye")) {
			try {
				line = console.readLine();
				streamOut.writeUTF(line);
				streamOut.flush();
			}
			catch(IOException ioe) {
				System.out.println("Sending error: " + ioe.getMessage());
			}
		}
	}

	/* FUNCTION AND PROCEDURE */
	public void start() throws IOException {
		console = new DataInputStream(System.in);
		streamOut = new DataOutputStream(socket.getOutputStream());
	}
	public void stop() {
		try {
			if(console != null) {
				console.close();
			}
			if(streamOut != null) {
				streamOut.close();
			}
			if(socket != null) {
				socket.close();
			}
		}
		catch(IOException ioe) {
			System.out.println("Error closing ...");
		}
	}

	/* MAIN ALGORITHM */
	public static void main (String args[]) {
		Client client = null;
		if(args.length != 2) {
			System.out.println("Usage: java Client host port");
		}
		else {
			client = new Client(args[0], Integer.parseInt(args[1]));
		}
	}
}