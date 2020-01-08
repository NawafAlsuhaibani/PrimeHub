<?php
/*$status = session_status();
if($status == PHP_SESSION_NONE){//There is no active session
    session_start();
}
require_once ("db.php");
$thrid = isset($_SESSION['thr_id']) ? $_SESSION['thr_id'] : "";
$commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : "";
if( !ctype_space($thrid) && !ctype_space($commentId) && !ctype_space($comment) && !ctype_space($uid) && isset($_SESSION["state"]) && $_SESSION["state"]===1) {
//$sql = "INSERT INTO tbl_comment(parent_comment_id,comment,comment_sender_name,date) VALUES ('" . $commentId . "','" . $comment . "','" . $uid . "','" . $date . "')";
$sql = "INSERT INTO comment (parent_comment_id,comment,user_id,thr_id) VALUES ('$commentId','$comment','$uid','$thrid');";
$result = mysqli_query($conn, $sql);
if (! $result) {
    $result = mysqli_error($conn);
}
print $result;
}*/
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
$thrid = isset($_SESSION['thr_id']) ? $_SESSION['thr_id'] : "";
$commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : "";
if( !ctype_space($thrid) && !ctype_space($commentId) && !ctype_space($comment) && !ctype_space($uid) && isset($_SESSION["state"]) && $_SESSION["state"]===1) {
$sql = "INSERT INTO comment (parent_comment_id,comment,user_id,thr_id) VALUES (?,?,?,?);";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1,$commentId);
	$stmt->bindParam(2,$comment);
	$stmt->bindParam(3,$uid);
	$stmt->bindParam(4,$thrid);
	$result = $stmt->execute();
	print $result;	
}
$conn = null;
?>
