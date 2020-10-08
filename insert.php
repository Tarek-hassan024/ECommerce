<?php


$name = $_POST['name'];
$email = $_POST['email'];
$passkey = $_POST['passkey'];
$repasskey = $_POST['repasskey'];


if (!empty($name) || !empty($email) || !empty($passkey) || !empty($repasskey)){
	
	$host = "localhost";
	$dbUserName = "root";
	$dbPasskey = "";
	$dbName = "ecommerce"
	
	//creating connection
	$conn = new mysqli($host, $dbUserName, $dbPasskey, $dbName);
	if(mqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else {
		$SELECT = "SELECT email From register Where email = ? Limit 1";
		$INSERT = "INSERT Into register (name, email, passkey, repasskey) values (?, ?, ?, ?)";
		
		//Preparing Statement
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_results($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		
		if ($rnum==0){
			$stmt->close();
			
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("ssss",username ,$email, $passkey, $repasskey);
			$stmt->execute();
			echo "Record inserted successfully"
		}
		else {
			echo "Someone has an account already with this email";
		}
		$stmt->close();
		$conn->close();
	}
}
else{
	echo "All fields are required";
	die();
}






?>