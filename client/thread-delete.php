<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
?>
<?php
if (isset($_SESSION["state"]) && $_SESSION["state"]===1 && !ctype_space($_SESSION["uid"])) {
	if(isset($_POST["thrid"]) && !ctype_space($_POST["thrid"])){
		$sql = "DELETE FROM `thread` WHERE `thr_id` = ?";
$stmt = $conn->prepare($sql);
$thrid = $_POST["thrid"];
$stmt->bindParam(1,$thrid);
$stmt->execute();
if($stmt->rowCount()>'0'){
	print "true";
}
else {
	print "false";
}
	}
}

$conn = null;


?>