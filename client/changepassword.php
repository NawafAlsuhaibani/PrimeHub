<?php
require_once ('../server/connection/config.php');
if(isset($_SESSION["uid"]) && isset($_SESSION["state"]) &&$_SESSION["state"]===1){
	if(isset($_SESSION["oldpassword"])&&isset($_SESSION["newpassword"])){
		if(!ctype_space($_POST["oldpassword"])&& !ctype_space($_POST["newpassword"])){
			$uname = $_SESSION["uid"];
			$oldpass = md5($_POST["oldpassword"]);
			$newpass = md5($_POST["newpassword"]);
			$sql = "select * from users where user_id = ? and password = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(1,$uname);
			$stmt->bindValue(2,$oldpass);
			$stmt->execute();
			if ($stmt->rowCount()=='1'){
				$sqlupdate = "update users set `password` = ? where user_id = ?";
				$stmt1 = $conn->prepare($sqlupdate);
				$stmt1->bindValue(1,$newpass);
				$stmt1->bindValue(2,$uname);
				$stmt1->execute();
				if($stmt1->rowCount()>'0'){
					echo "user's password has been updated..logging out....";
					header("Refresh: 2; URL = ../server/logout.php");
					
				}
				else {
					echo "user's password NOT updated,, maybe you entered the same password?";
				}
			}
			else if ($stmt->rowCount()=='0'){
				echo "username / oldpassword are invalid";
			}
	   }
		else {echo "passwords are empty";}
	   }
			else {
				echo "nothing is set";
			}
		
	}
else {
	echo "no state or id";
}

$conn = null;
?>