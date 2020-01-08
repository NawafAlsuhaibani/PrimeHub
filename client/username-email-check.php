<?php  
//check.php  
require_once ('../server/connection/config.php');
if(isset($_POST["username"]) && !ctype_space($_POST["username"])){
	$uname = $_POST["username"];
	$sqlcheck = "SELECT * FROM users WHERE username = ? ";
	$stmt = $conn->prepare($sqlcheck);
	$stmt->bindValue(1,$uname);
	$stmt->execute();
	$count = $stmt->rowCount();
	echo $count;
}
else if(isset($_POST["email"]) && !ctype_space($_POST["email"])){
	$email = $_POST["email"];
	$sqlcheck = "SELECT * FROM users WHERE email = ? ";
	$stmt = $conn->prepare($sqlcheck);
	$stmt->bindValue(1,$email);
	$stmt->execute();
	$count = $stmt->rowCount();
	echo $count;
}
else {
	echo "error, input is empty or not set";
}


$conn = null;
?>
