<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
?>
<?php
require_once ('../server/connection/config.php');
$return_arr = array();
if (isset($_SESSION["state"]) && $_SESSION["state"]===1 && !ctype_space($_SESSION["uid"]))  {
	$uid = $_SESSION["uid"];
$sql = "SELECT `thr_id`,`cat_name`,`thr_content`,thread.date_created FROM `thread`,`category`WHERE thread.user_id = ? and thread.cat_id = category.cat_id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1,$uid);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);
}
else {
	echo "nono";
}
$conn = null;
?>