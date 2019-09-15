<?php

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$db_name = "pus_baza";
	
	//dohvaćanje podataka iz URLa pomoću GET metode
	$id = $_GET["id"];	
	$datumOD = $_GET["datumOD"];
	$datumDO = $_GET["datumDO"];
	
	//inicijalizacija polja za dohvaćene podatke iz baze
	$fade = [];	
	$datum = [];
	
	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	//dohvati podatke unutar zadanog raspona
	$sql = "SELECT * FROM led$id WHERE datetime>='$datumOD' and datetime<='$datumDO'";
	$result = $conn->query($sql);
	
	//spremanje podataka u polje
	while($row = $result->fetch_assoc()) {
		
		$fade [] = $row["fade"];
		$datum [] = $row["datetime"];
				
	}
	
	mysqli_close($conn);
	
	//formatiranje polja u JSON tip
	echo json_encode(array( "fade"=>$fade, "datum"=>$datum));

?>
