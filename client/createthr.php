<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
?>
<?php
	if (isset($_SESSION["state"]) && $_SESSION["state"]===1 && !empty($_SESSION["uid"])) { //if user is logged in ,, cont...
		if(isset($_POST["comment"]) && !ctype_space($_POST["comment"]) && isset($_POST["catname"]) && !ctype_space($_POST["catname"])  && $_POST["comment"]!= ""){//checking if the new thread is not empty
			$thr= $_POST["comment"];
			$catid= $_POST["catname"];
			$userid= $_SESSION["uid"];
			$sqlinsert = "INSERT INTO thread(user_id,cat_id , thr_content) VALUES (?,?,?);";
			$stmt = $conn->prepare($sqlinsert);
			$stmt->bindValue(1,$userid);
			$stmt->bindValue(2,$catid);
			$stmt->bindValue(3,$thr);
			$stmt->execute();
			if($stmt->rowCount()>0){
			header("Location: index.php");	
			}
			else {
				//header("Location: create.php");
				$str =  "error insering the thread";
				header("Location: error.php?error=$str");
			}
		}
		else{
			$str =  "empty fields!";
			header("Location: error.php?error=$str");
		}
	}
else {
	$str =  "something went wrong!";
	header("Location: error.php?error=$str");
}
$conn = null;
?>