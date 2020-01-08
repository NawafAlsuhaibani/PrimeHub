<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
?>
<?php

if (isset($_SESSION["state"]) && $_SESSION["state"]===2 ) {
	if(isset($_POST["uid"]) && !ctype_space($_POST["uid"])){
		if($_POST["action"]=="make" && isset($_POST["action"])){
					$sql = "UPDATE `users` SET `isAdmin`= ? where user_id = ?";
$stmt = $conn->prepare($sql);
$in = 1;
$thrid = $_POST["uid"];
$stmt->bindParam(1,$in);
$stmt->bindParam(2,$thrid);
$stmt->execute();
if($stmt->rowCount()>'0'){
	print "true";
}
else {
	print "false";
}
		}
		else if($_POST["action"]=="remove" && isset($_POST["action"])){
					$sql = "UPDATE `users` SET `isAdmin`= ? where user_id = ?";
$stmt = $conn->prepare($sql);
$in = 0;
$thrid = $_POST["uid"];
$stmt->bindParam(1,$in);
$stmt->bindParam(2,$thrid);
$stmt->execute();
if($stmt->rowCount()>'0'){
	print "true";
}
else {
	print "false";
}
		}
		
	}
	else {
		print "flase";
	}
}
else{
	print "false";
}

$conn = null;


?>