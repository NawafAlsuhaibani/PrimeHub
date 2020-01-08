<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
?>
<?php
require_once ('connection/config.php');
$st= false;
if(isset($_POST["email"]) && isset($_POST["pass"])) { // validate if data is sent.
	$email = $_POST["email"];
	$pass = md5($_POST["pass"]);
	if(!empty($pass) && !empty($email)){ // validate if email is correctly formated 
		check($email);
		if($st==true){
			login($email,$pass);
			
		}
		else if($st==false){
			loginver($email,$pass);
		}
		}
}
function login($email,$pass){
	global $conn;
	$sqllogin = "select * from users where password = ? and  (email = ? or username = ? ) ";
	$stmt = $conn->prepare($sqllogin);
	$stmt->bindValue(3,$email);
	$stmt->bindValue(2,$email);
	$stmt->bindValue(1,$pass);
	$stmt->execute();
	if($stmt->rowCount()>'0'){ // user exist
		$st=true;
		while($result=$stmt->fetch()){
		$uname = $result["username"];
		if($result["isActive"]=='1'){
		$_SESSION["uid"] = $result["user_id"];
		if($result["isAdmin"]=='0'){
			echo "Logged in as $uname...Redirecting";
			header("Refresh: 2; URL = ../client/index.php"); // if login successfully then go to homepage else go to login page 
		$_SESSION["state"] = 1;
		}
		else if($result[0]["isAdmin"]==='1'){
			$_SESSION["state"] = 2;
			header("Location: admin.php");
		}
	}
			
		else {
			header("Location: ../client/notactive.php");
		}
	}
	}
		
		else {
			$_SESSION["state"] = 0;
			echo "Invalid email/password...Redirecting";
			header("Refresh: 2; URL = ../client/login.html"); // if login successfully then go to homepage else go to login page
		}
}
function loginver($email,$pass){
	global $conn;
	$sqllogin = "select * from users where passwordrec = ? and  (email = ? or username = ? ) ";
	$stmt = $conn->prepare($sqllogin);
	$stmt->bindValue(3,$email);
	$stmt->bindValue(2,$email);
	$stmt->bindValue(1,$pass);
	$stmt->execute();
	if($stmt->rowCount()>'0'){ // user exist
		$st=true;
		while($result=$stmt->fetch()){
			$_SESSION["uidrec"] = $result["user_id"];
		}
			echo "logged in...Redirecting";
			header("Refresh: 2; URL = ../client/passwordrec.php"); // if login successfully then go to homepage else go to login page
	}
		else {
			$_SESSION["state"] = 0;
			echo "Invalid email/password...Redirecting";
			header("Refresh: 2; URL = ../client/login.html"); // if login successfully then go to homepage else go to login page
		}
}
function check($email){
	global $conn;
	global $st;
	$sqllogin = "select passwordrec from users where email = ? or username = ?";
	$stmt = $conn->prepare($sqllogin);
	$stmt->bindValue(1,$email);
	$stmt->bindValue(2,$email);
	$stmt->execute();
	if($stmt->rowCount()>'0'){ // user exist
		while($result=$stmt->fetch()){
		$xx = $result["passwordrec"];
		if($result["passwordrec"]==''){
			$st = true;
	}
			
		else {
			$st = false;
		}
	}
	}
		
		else {
			$_SESSION["state"] = 0;
			echo "Invalid email/password...Redirecting";
			header("Refresh: 2; URL = ../client/login.html"); // if login successfully then go to homepage else go to login page
		}
}
$conn = null;
?>