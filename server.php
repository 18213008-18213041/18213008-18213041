<?php
	$var = $_GET['rfid'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "driver";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT rfid FROM log WHERE rfid=" . $var;
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) == 0) {
		$timein = date('Y-m-d H:i:s');
		$sql = "INSERT INTO log (rfid, timein) VALUES (" . $var . ", '" . $timein . "')";
		$result = $conn->query($sql);
		if ($result === TRUE) {
			echo "Driver come in <br>";
		} else {
			echo "Error at first reading <br>";
		}
	} else {
		$sql = "SELECT rfid FROM log WHERE rfid=" . $var . " AND timeout IS NULL";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) == 0) {
			$timein = date('Y-m-d H:i:s');
			$sql = "INSERT INTO log (rfid, timein) VALUES (" . $var . ", '" . $timein . "')";
			$result = $conn->query($sql);
			if ($result === TRUE) {
				echo "Driver come in <br>";
			} else {
				echo "Error at first reading <br>";
			}			
		} else {
			$timeout = date('Y-m-d H:i:s');
			$sql = "UPDATE log SET timeout='" . $timeout . "', price=1500+(ROUND((timeout - timein)/60) * 500) " . " WHERE rfid=" . $var . "ORDER BY timein DESC LIMIT 1";
			$result = $conn->query($sql);
			if ($result === TRUE) {
				echo "Driver go out <br>";

				$sql = "SELECT price FROM log WHERE rfid=" . $var . " ORDER BY timeout DESC LIMIT 1";
				$result = $conn->query($sql);
				$row = mysqli_fetch_array($result);
				$cost = $row['price'];

				$sql = "UPDATE card SET pulse=pulse-" . $cost . " WHERE rfid=" . $var;
				$result = $conn->query($sql);
				if ($result === TRUE) {
					echo "Took driver's money <br>";
				} else {
					echo "Error at third reading <br>";
				}	
			} else {
			    echo "Error at second reading <br>";
			}			
		}
	}

	$conn->close();
?>
