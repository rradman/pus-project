<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$db_name = "pus_baza";	
	
	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM rpi_time LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$vrijeme_db = $row["rpi_timestamp"];

		$trenutno_vrijeme = time();
		if($trenutno_vrijeme - 6 > $vrijeme_db){
			echo("1");
		}
		else{
			echo("0");
		}
	}
?>
