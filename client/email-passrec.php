<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
?>
<?php
require_once ('../server/connection/config.php');
if(isset($_POST["email"]) &&  !ctype_space($_POST["email"])) {
	$email = $_POST["email"];
	$sqllogin = "select * from users where email = ? ";
	$stmt = $conn->prepare($sqllogin);
	$stmt->bindValue(1,$email);
	$stmt->execute();
	if($stmt->rowCount()=='1'){
		while($result=$stmt->fetch()){
			$email = $result["email"];
			$uname = $result["username"];
		}
		$pass1 = randomPassword();
		$pass2 = md5($pass1);
	$sqllogin1 = "update users set passwordrec = ? where email = ?;";
	$stmt1 = $conn->prepare($sqllogin1);
	$stmt1->bindValue(2,$email);
	$stmt1->bindValue(1,$pass2);
	$stmt1->execute();
	if($stmt1->rowCount()=='1'){
		header("Refresh: 1; URL = ../server/PHPMailer/examples/gmail.php?email=$email&uname=$uname&pass=$pass1");
	}
		else {
echo "update is set";	
}
	}
	else {
echo "select * is wrong is set";	
}
}
else {
echo "nothing is set";	
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
$conn = null;
?>