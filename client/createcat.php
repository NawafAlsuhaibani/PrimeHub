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
		if(isset($_POST["newcat"]) && !ctype_space($_POST["newcat"]) && $_POST["newcat"]!= ""){ // checking if the new category is not empty
			$catname= $_POST["newcat"];
			$userid= $_SESSION["uid"];
			$sqlinsert = "INSERT INTO  category(user_id,cat_name) VALUES (?,?);";
			$stmt = $conn->prepare($sqlinsert);
			$stmt->bindValue(1,$userid);
			$stmt->bindValue(2,$catname);
			$stmt->execute();
			if($stmt->rowCount()>0){
			header("Location: index.php");	
			}
			else {
				//header("Location: create.php");
				$str = "something is wrong";
				header("Location: error.php?error=$str");
			}
		}
		else{
			$str = "empty fields!";
			header("Location: error.php?error=$str");
		}
	}
else {
	$str = "something went wrong!";
	header("Location: error.php?error=$str");
}
$conn = null;
?>