<?php
	// Name/NIM		: Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
	// Date			: 5 November 2015

	if(isset($_GET["action"]) && isset($_GET["id"]) && (isset($_GET["action"]) == "get_info")) {
		$info = file_get_contents('http://localhost/progif/rest-api.php?action=get_info&id=' . $_GET["id"]);
		echo $info;
		echo "<br>";
		$info = json_decode($info, true);
		echo "<br>";
	}
?>
<table border = "1">
	<tr>
		<td>ID</td>
		<td><?php echo $info["id"]?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo $info["name"]?></td>
	</tr>
	<tr>
		<td>Addres</td>
		<td><?php echo $info["address"]?></td>
	</tr>
	<tr>
		<td>Latitude</td>
		<td><?php echo $info["lat"]?></td>
	</tr>
	<tr>
		<td>Longitude</td>
		<td><?php echo $info["lng"]?></td>
	</tr>
</table>
<br>
<table border = "1">
	<tr>
		<td>ID</td><td>Name</td><td>Address</td><td>Latitude</td><td>Longitude</td>
	</tr>
	<tr>
		<td><?php echo $info["id"]?></td><td><?php echo $info["name"]?></td><td><?php echo $info["address"]?></td><td><?php echo $info["lat"]?></td><td><?php echo $info["lng"]?></td>
	</tr>
</table>
