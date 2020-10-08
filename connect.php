<?php

$username = filter_input(INPUT_POST, 'name');
$useremail= filter_input(INPUT_POST, 'email');
$userpasskey = filter_input(INPUT_POST, 'passkey');
$userrepasskey = filter_input(INPUT_POST, 'repasskey');

//Validation
if (!empty($username)){
	if(!empty($userpasskey)){
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "ecommerce";
		
		
			//creating connection
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}
		else {
			$sql = "INSERT INTO register (username, useremail, userpasskey, userpasskey2) values ('$username', '$useremail', '$userpasskey', '$userrepasskey')";
			
			if($conn->query($sql)){
				echo "New record is inserted succesfully";
			}
			else {
				echo "Error: ". $sql ."<br>" . $conn->error;
			}
			$conn->close();
		}
	}
	else {
		echo "Passkey should not be empty";
		die();
	}
}
else {
	echo "Username should not be empty";
	die();
}



?>