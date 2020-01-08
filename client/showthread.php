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
    $sql = ("SELECT thr_content, users.username,thread.date_created FROM thread,users WHERE thr_id = ? and thread.user_id = users.user_id;UPDATE thread SET `click_num` = `click_num`+1 WHERE `thr_id` =?;");
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1,$thrid);
	$stmt->bindValue(2,$thrid);
	$stmt->execute();
	if($stmt==TRUE){
		while($row =$stmt->fetch()){
			echo "<div id=thread><p>".$row["thr_content"]."</p>";
			echo "<span class=info>created by ".$row["username"]." created at ".$row["date_created"]."</span></div>";
	}
	}else {
		
	}
  }
$conn = null;
?>