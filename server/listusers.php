<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
	
}
?>
<?php
require_once ('connection/config.php');
//if(isset($_SESSION["state"]) && $_SESSION["state"]=='2'){
	if(isset($_POST["str"]) && !ctype_space($_POST["str"])){
		$str =  "%".$_POST["str"]. "%";
	$sql = "SELECT users.`user_id`, `name`, `email`, `username`, `isAdmin`, users.`created_date`, `isActive` FROM `users`,thread WHERE ( `name` LIKE ? OR `email` LIKE ? OR `username` LIKE ? OR thread.thr_content LIKE ? ) AND users.user_id=thread.user_id GROUP BY users.`user_id`";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1,$str);
	$stmt->bindParam(2,$str);
	$stmt->bindParam(3,$str);
	$stmt->bindParam(4,$str);
	$stmt->execute();
	if($stmt->rowCount()>'0'){
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);	
	}
	else {
		echo "no users";
	}
	}
else {
	$sql = "SELECT `user_id`, `name`, `email`, `username`, `isAdmin`, `created_date`, `isActive` FROM `users`;";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	if($stmt->rowCount()>'1'){
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);	
	}
	else {
		echo "no users";
	}
}
	
	
/*}
else {
	header("Location: ../client/login.php");
}*/
$stmt=null;
$conn= null;
?>