// Name/NIM		: Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
// Date			: 9 September 2015
// Source		: pirate.shu.edu/~wachsmut/Teaching/CSAS2214/Virtual/Lectures/chat-client-server.html

/* LIBRARY */
import java.net.*;
import java.io.*;

public class Server {
	/* ATTRIBUTE */
	private Socket socket = null;
	private ServerSocket server = null;
	private DataInputStream streamIn = null;

	/* CONSTRUCTOR */
	public Server(int port) {
		try {
			System.out.println("Binding to port " + port + ", please wait ...");
			server = new ServerSocket(port);
			System.out.println("Server started: " + server);
			System.out.println("Waiting for a client ...");

			socket = server.accept();
			System.out.println("Client accepted: " + socket);
			System.out.println("To end the connection, write '@bye'");
			open();
			boolean done = false;
			while(!done) {
				try {
					String line = streamIn.readUTF();
					System.out.println(line);
					done = line.equals("@bye");
				}
				catch(IOException ioe) {
					done = true;
				}
			}
			close();
		}
		catch(IOException ioe) {
			System.out.println(ioe);
		}
	}

	/* FUNCTION AND PROCEDURE */
	public void open() throws IOException {
		streamIn = new DataInputStream(new BufferedInputStream(socket.getInputStream()));
	}
	public void close() throws IOException {
		if(socket != null) {
			socket.close();
		}
		if(streamIn != null) {
			streamIn.close();
		}
	}

	/* MAIN ALGORITHM */
	public static void main(String args[]) {
		Server server = null;
		if(args.length != 1) {
			System.out.println("Usage: java Server port");
		}
		else {
			server = new Server(Integer.parseInt(args[0]));
		}
	}
}