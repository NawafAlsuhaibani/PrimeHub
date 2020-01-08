<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
?>
<?php

		

		if($_POST["action"]=="removethr" && isset($_POST["action"])){
			$sql1 = "DELETE FROM thread WHERE thr_id = ? ";
			$stmt1 = $conn->prepare($sql1);
			$thrid1 = $_POST["thrid1"];
			$stmt1->bindParam(1,$thrid1);
			$stmt1->execute();
			if($stmt1->rowCount()>'0'){
				print "false";
			}
			else {
				print "false";
			}
		}
?>