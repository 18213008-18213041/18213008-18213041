<?php
	function get_info_by_id($id) {
		$info = array();
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "laundry";


		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM markers WHERE id=$id";
		$result = $conn->query($sql);
		$info = $result->fetch_assoc();

		$conn->close();

		return $info;
	}
	if (isset($_GET["action"])) {
		switch($_GET["action"]) {
			case "get_info";
				if(isset($_GET["id"]))
					$value = get_info_by_id($_GET["id"]);
				else
					$value = "ERROR";
				break;
		}
	}
	exit (json_encode($value));
?>
