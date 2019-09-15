<?php

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$db_name = "db_pus";

	$conn = new mysqli($servername, $username, $password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$sql = "SELECT * FROM led1 ORDER BY DATETIME DESC LIMIT 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$fade_saved = $row["fade"];	//dodano
	}
	shell_exec('python /home/pus/public_html/publish.py 1 '.$fade_saved);	//dodano


        $sql = "SELECT * FROM led2 ORDER BY DATETIME DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $fade_saved = $row["fade"];     //dodano
        }
        shell_exec('python /home/pus/public_html/publish.py 2 '.$fade_saved);       //dodano


        $sql = "SELECT * FROM led3 ORDER BY DATETIME DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $fade_saved = $row["fade"];     //dodano
        }
        shell_exec('python /home/pus/public_html/publish.py 3 '.$fade_saved);       //dodano


        $sql = "SELECT * FROM led4 ORDER BY DATETIME DESC LIMIT 1"
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $fade_saved = $row["fade"];     //dodano
        }
        shell_exec('python /home/pus/public_html/publish.py 4 '.$fade_saved);       //dodano

	mysqli_close($conn);
?>
