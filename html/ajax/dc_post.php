<?php
	include "../config/config.php";		//dohvati podatke iz konfiguracijske datoteke
	
	//dohvati poslane podatke iz URL-a GET metodom
	$id = $_GET["id"];
	$valueslider = $_GET["valueslider"];
	
	if($valueslider != 0){
		$conn = new mysqli($servername, $username, $password, $db_name);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		//unesi nove vrijednosti u bazu
		$sql = "INSERT INTO led$id VALUES (DATE_ADD(NOW(), INTERVAL 2 HOUR),'$valueslider',1)";
		$result = $conn->query($sql);
		
		shell_exec('python /home/pus/public_html/pus/publish.py '.$id.' '.$valueslider);

	}	
	mysqli_close($conn);
	
?>

