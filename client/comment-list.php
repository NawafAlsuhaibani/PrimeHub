<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
?>
<?php
if (isset($_SESSION['thr_id']) && !empty($_SESSION['thr_id']) ){
	$thrid = $_SESSION['thr_id'];
	$record_set = array();
	$sql = "SELECT comment_id,parent_comment_id,comment,username as comment_sender_name,date FROM `comment`,`users` where thr_id = ? and comment.user_id=users.user_id ORDER BY parent_comment_id asc, comment_id asc";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1,$thrid);
	$stmt->execute();
	if($stmt==TRUE){
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
}
}
$stmt=null;
$conn = null;
?>