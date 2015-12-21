<?php
	/* Name/NIM		: Nicholas Posma Nasution Indra Nicolosi Waskita/18213041 */
	/* Date			: Tuesday, 24 November 2015 */

	function searchEvent($criteria) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dbprogif";

		$conn = new mysqli($servername, $username, $password, $dbname);
		$rows = array();

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			$rows = "fail";
		} else {
			$sql = "SELECT * FROM komunitas WHERE nama_lembaga LIKE '%" . $criteria .  "%' OR deskripsi LIKE '%" . $criteria ."%'";
			$result = $conn->query($sql);
			while($r = $result->fetch_assoc()){
				$rows[] = array('data' => $r);
			}
		}

		$conn->close();
		return $rows;
	}

	function sortEvent($criteria, $order) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dbprogif";

		$conn = new mysqli($servername, $username, $password, $dbname);
		$rows = array();

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			$rows = "fail";
		} else {
			$sql = "SELECT * FROM komunitas ORDER BY $criteria" . " " . $order;
			$result = $conn->query($sql);
			while($r = $result->fetch_assoc()){
				$rows[] = array('data' => $r);
			}
		}

		$conn->close();
		return $rows;
	}

	if(isset($_GET["action"])) {
		switch($_GET["action"]) {
			case "search";
				$rows = searchEvent($_GET["criteria"]);
				break;
			case "sort";
				$rows = sortEvent($_GET["criteria"], $_GET["order"]);
				break;
		}
		exit(json_encode($rows));
	} else {

	}
?>
