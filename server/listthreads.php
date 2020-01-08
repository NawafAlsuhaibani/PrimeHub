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
	$sql = "SELECT thread.`thr_id`,thread.user_id, category.`cat_name`, `thr_content`, thread.`date_created` FROM `thread`,category WHERE thread.cat_id=category.cat_id
;";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	if($stmt->rowCount()>'1'){
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);	
	}
	else {
		echo "no threads!";
	}
	
/*}
else {
	header("Location: ../client/login.php");
}*/
$stmt=null;
$conn= null;
?>