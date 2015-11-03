<?php
	// Name/NIM		: Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
	// Date			: 3 November 2015
	// Source		: http://www.w3schools.com/php/php_mysql_select.asp

	class API {
		function helloworld() {
			return "Hello World!";
		}
		function addition($a, $b) {
			return $a + $b;
		}
		function printdata() {
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "laundry";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT * FROM markers";
			$result = $conn->query($sql);

			$text ="Id | Name | Address | Lat | Lng<br>";

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$text = $text . $row["id"] . " | " . $row["name"] . " | " . $row["address"] . " | " . $row["lat"] . " | " . $row[lng] . "<br>";
				}
				return $text;
			} 
			else {
				return 0;
			}
			$conn->close();
		}
	}
	$opt=array('uri'=>'http://localhost/progif');
	$server=new SoapServer(NULL,$opt);
	$server->setClass('API');
	$server->handle();
?>
