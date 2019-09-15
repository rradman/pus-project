<?php

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$db_name = "pus_baza";
	
	$fade = [];
	$datum = [];
		
	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	//dohvati zadnjih 10 unosa u bazu
	$sql = "SELECT * FROM led1 ORDER BY datetime DESC LIMIT 10";
	$result = $conn->query($sql);
	
	//napuni polje sa podacima iz baze
	while($row = $result->fetch_assoc()) {
		
		$fade [] = $row["fade"];
		$datum [] = $row["datetime"];
				
	}
	
	mysqli_close($conn);
	//formatiraj polje u JSON tip
	echo json_encode(array( "fade"=>$fade, "datum"=>$datum));

?>
