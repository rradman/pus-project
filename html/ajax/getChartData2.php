<?php

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$db_name = "pus_baza";
	
	
	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "SELECT * FROM led2 ORDER BY datetime DESC LIMIT 10";	//pogledaj zadnji DC i usporedi ga sa novim unosom 		//provjeri ORDER BY ???
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()) {
		
		$fade [] = $row["fade"];
		$datum [] = $row["datetime"];
		
		
	}
	
	mysqli_close($conn);
echo json_encode(array( "fade"=>$fade, "datum"=>$datum));

?>
