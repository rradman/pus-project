<?php
	include "../config/config.php";	//učitavanje konfiguracijske datoteke za spajanje na bazu
	
	$ledBroj = $_GET["id"];		//dohvati ID ledice iz URL-a
	$ledAkcija = $_GET["akcija"];	//dohvati akciju (1 ili 0) iz URL-a pomoću GET metode

	//spajanje na bazu
	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	//uzmi zadnji fade 
	$sqlGetLastFade = "SELECT fade FROM led$ledBroj ORDER BY DATETIME DESC LIMIT 1";	
	$result = $conn->query($sqlGetLastFade);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$last_fade = $row["fade"];
	}
	if($last_fade > 0){
		$flag = 1;
		}
		else{
			$flag = 0;
			}


	//gašenje ledice
	if($ledAkcija==0 && $flag==1){
		$sql = "INSERT INTO led$ledBroj VALUES (DATE_ADD(NOW(), INTERVAL 2 HOUR),0,1)";
		$result = $conn->query($sql);
	shell_exec('python /home/pus/public_html/pus/publish.py '.$ledBroj.' 0');
	}
	//paljenje ledice
	if($ledAkcija==1 && $flag==0){
		//uzmi zadnji fade koji je različit od nule
		$sqlGetLastFade = "SELECT * FROM led$ledBroj WHERE fade>0 ORDER BY DATETIME DESC LIMIT 1";	
		$result = $conn->query($sqlGetLastFade);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$fade_saved = $row["fade"];
			
			//ubaci dohvaćeni fade u bazu
			$sql = "INSERT INTO led$ledBroj VALUES (DATE_ADD(NOW(), INTERVAL 2 HOUR),'$fade_saved',1)";
			$result = $conn->query($sql);
			shell_exec('python /home/pus/public_html/pus/publish.py '.$ledBroj.' '.$fade_saved);

		}
		//u slučaju da je baza prazna, unesi fade=100
		else{
			$sql = "INSERT INTO led$ledBroj VALUES (DATE_ADD(NOW(), INTERVAL 2 HOUR),'100',1)";
			$result = $conn->query($sql);
		}		
	}
	mysqli_close($conn);
?>
