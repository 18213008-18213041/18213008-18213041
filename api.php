
<?php
	/* Name/NIM		: Nicholas Posma Nasution Indra Nicolosi Waskita/18213041 */
	/* Date			: Tuesday, 24 November 2015 */

	function putCSV($csv) {

		$errors = array();
		$file_name = $_FILES['csv']['name'];
		$file_size =$_FILES['csv']['size'];
		$file_tmp = $_FILES['csv']['tmp_name'];
		$file_type = $_FILES['csv']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['csv']['name'])));

		$expensions = array("csv");

		if(in_array($file_ext, $expensions) === false) {
		 $errors[] = "extension not allowed, please choose a CSV file.";
		}

		if($file_size > 2097152){
		 $errors[] = 'File size must be excately 2 MB';
		}

		if(empty($errors) == true){
			$columnArray	= array();
			$dataArray		= array();
			$firstRule		= true;

			$handle = fopen($csv, "r");

			while($data = fgetcsv($handle, 1000, ",")) {
				if($firstRule) {
					foreach($data as $columnName) {
						$columnArray[] = $columnName;
					}

					$firstRule = false;
				}else {
					$rule = array();
					for($i = 0; $i < count($data) ; $i++) {
						$rule[$columnArray[$i]] = $data[$i];
					}
					$dataArray[] = $rule;
				}		
			} 
			
			$rows = "Fail";

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "dbprogif";

			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} else {
				foreach($dataArray as $data) {
					foreach($data as $element) {
			 			$query = "INSERT INTO `detil_event1` (" .implode(',', $columnArray). ") 
						VALUES (" .$element. ")";

						mysqli_query($conn, $query) or die(mysql_error());
					}
				}
				$rows = "Success";
			} 

			$conn->close(); 
			fclose($handle);
		} else {
			$rows = "Fail";
		}
		
		return $rows;	
	}

	function getCalendar($year, $month) {
		include('simple_html_dom.php');
		$homepage = file_get_html('http://www.itb.ac.id/calendar/monthly/' . $year . $month .'/');

		foreach ($homepage->find ('.span8b') as $e)
			echo $e->innertext.'<br>';
	
		$rows = " Kalender Akademik ITB " ;

		return $rows;
	}

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
			$sql = "SELECT id_event, nama, tanggal, lokasi, biaya, rating FROM detil_event1 WHERE nama LIKE '%" . $criteria .  "%' OR deskripsi LIKE '%" . $criteria ."%'";
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
			$sql = "SELECT id_event, nama, tanggal, lokasi, biaya, rating FROM detil_event1 ORDER BY $criteria" . " " . $order;
			$result = $conn->query($sql);
			while($r = $result->fetch_assoc()){
				$rows[] = array('data' => $r);
			}
		}

		$conn->close();
		return $rows;
	}

	function filterEvent($year, $month, $target, $location) {
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
			$sql = "SELECT id_event, nama, tanggal, lokasi, biaya, rating FROM detil_event1 ";

			if(empty($year)) {
				if(empty($month)) {
					if(empty($target)) {
						if(empty($location)) {
							
						} else {
							$sql = $sql . "WHERE SUBSTRING_INDEX(lokasi, ' ', 1) IN ($location) ";
						}					
					} else {
						$sql = $sql . "WHERE target_peserta IN ($target) ";
						if(empty($location)) {
							
						} else {
							$sql = $sql . "AND SUBSTRING_INDEX(lokasi, ' ', 1) IN ($location) ";
						}
					}
				} else {
					$sql = $sql . "WHERE Month(tanggal) IN (" . mysql_real_escape_string($month) . ") ";
					if(empty($target)) {
						if(empty($location)) {
							
						} else {
							$sql = $sql . "AND SUBSTRING_INDEX(lokasi, ' ', 1) IN ($location) ";
						}						
					} else {
						$sql = $sql . "AND target_peserta IN ($target) ";
						if(empty($location)) {
							
						} else {
							$sql = $sql . "AND SUBSTRING_INDEX(lokasi, ' ', 1) IN ($location) ";
						}
					}
				}				
			} else {
				$sql = $sql . "WHERE Year(tanggal) IN (" . mysql_real_escape_string($year) . ") ";
				if(empty($month)) {
					if(empty($target)) {
						if(empty($location)) {
							
						} else {
							$sql = $sql . "AND SUBSTRING_INDEX(lokasi, ' ', 1) IN ($location) ";
						}						
					} else {
						$sql = $sql . "AND target_peserta IN ($target) ";
						if(empty($location)) {
							
						} else {
							$sql = $sql . "AND SUBSTRING_INDEX(lokasi, ' ', 1) IN ($location) ";
						}
					}					
				} else {
					$sql = $sql . "AND Month(tanggal) IN (" . mysql_real_escape_string($month) . ") ";
					if(empty($target)) {
						if(empty($location)) {
							
						} else {
							$sql = $sql . "AND SUBSTRING_INDEX(lokasi, ' ', 1) IN ($location) ";
						}						
					} else {
						$sql = $sql . "AND target_peserta IN ($target) ";
						if(empty($location)) {
							
						} else {
							$sql = $sql . "AND SUBSTRING_INDEX(lokasi, ' ', 1) IN ($location) ";
						}
					}
				}
			}
			 
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
			case "filter";
				$rows = filterEvent($_GET["year"], $_GET["month"], $_GET["target"], $_GET["location"]);
				break;
			case "calendar";
				$rows = getCalendar($_GET["year"], $_GET["month"]);
				break;
		}
		exit(json_encode($rows));
	} else {
		$rows = putCSV($_FILES['csv']['tmp_name']);
		header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();
	}
?>
