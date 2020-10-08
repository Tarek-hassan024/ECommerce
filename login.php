<?php

//Technique 1

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ecommerce";

@mysql_connect($host, $dbusername, $dbpassword);
mysql_select_db($dbname);

if(isset($_POST['email'])){
	$email = $_POST['email'];
	$passkey = $_POST['passkey'];
	
	$sql = "select * from register where useremail = '".$email."' AND userpasskey = '".$passkey."' limit 1";
	
	$result = mysql_query($sql);
	if(mysql_num_rows($result)==1){
		echo "Congratulations!! You have successfully logged in";
		exit();
	}
	else {
		echo "You entered wrong email/password, check it again";
		exit;
	}
}


/* $useremail = $_POST['email'];
$passkey = $_POST['passkey'];
//preventing mysql injection

//$useremail = stripslashes($useremail);
//$passkey = stripslashes($passkey);

//$useremail = mysql_real_escape_string($useremail);
//$passkey = mysql_real_escape_string($passkey);


//connecting to the server and the database selection


mysql_connect("localhost", "root", "");
mysql_select_db("ecommerce");

//Query the database for the user!!

$out = mysql_query("SELECT * FROM register WHERE useremail = '$useremail' AND userpasskey = '$passkey'") or die("Sorry!! Failed to find the database");

$row = mysql_fetch_array($out);
if($row['useremail']== $useremail && $row['userpasskey'] == $passkey){
	echo "Login Successful!!! Welcome",$row['username'];

}
else {
	echo "Failed to Login!! Try Again";
} */


?>