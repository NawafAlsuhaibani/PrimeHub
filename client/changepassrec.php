<?php
require_once ('../server/connection/config.php');
if(isset($_SESSION["uidrec"])){
	if(isset($_SESSION["oldpassword"])&& isset($_SESSION["newpassword"])){
		if(!ctype_space($_POST["oldpassword"])&& !ctype_space($_POST["newpassword"])){
			$uname = $_SESSION["uidrec"];
			$oldpass = md5($_POST["oldpassword"]);
			$newpass = md5($_POST["newpassword"]);
			$sql = "select * from users where user_id = ? and passwordrec = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(1,$uname);
			$stmt->bindValue(2,$oldpass);
			$stmt->execute();
			if ($stmt->rowCount()=='1'){
				$conn->beginTransaction();
				try{				
				$sqlupdate = "update users set password = ? where user_id = ? ";
				$stmt1 = $conn->prepare($sqlupdate);
				$stmt1->bindValue(1,$newpass);
				$stmt1->bindValue(2,$uname);
				$stmt1->execute();
				if($stmt1->rowCount()>'0'){
				$sqlupdate1 = "update users set passwordrec = NULL where user_id = ?;";
				$stmt2 = $conn->prepare($sqlupdate1);
				$stmt2->bindValue(1,$uname);
				$stmt2->execute();
				if($stmt2->rowCount()=='1'){
					$conn->commit();
					unset($_SESSION["uidrec"]);
					echo "user's password has been updated<br>";
					echo "<a class='' href='login.html'>Login here</a>";
				}	
				}
				else {
					echo "user's password NOT updated<br>";
					echo "<a class='' href='passwordrec.php'>try again</a>";
				}	
				
					}
				catch(Exception $e){
    //An exception has occured, which means that one of our database queries
    //failed.
    //Print out the error message.
    echo $e->getMessage();
    //Rollback the transaction.
    $conn->rollBack();
}
			}
			else if ($stmt->rowCount()=='0'){
				echo "oldpassword are invalid<br>";
				echo "<a class='' href='passwordrec.php'>try again</a>";
			}
	   }
		else {echo "passwords are empty<br>";echo "<a class='' href='passwordrec.php'>try again</a>";}
	   }
			else {
				echo "nothing is set<br>";echo "<a class='' href='passwordrec.php'>try again</a>";
			}
		
	}
else {
	echo "no state or id";
}

$conn = null;
?>