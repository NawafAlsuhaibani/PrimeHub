<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
?>
<?php
	if(isset($_SESSION["uid"]) && isset($_SESSION["state"]) && $_SESSION["state"]===1){
		if(!ctype_space($_SESSION["uid"])){
			$uname = $_SESSION["uid"];
			$sql = "select name,email,count(thread.thr_id) as total from users LEFT JOIN thread ON thread.user_id=users.user_id where users.user_id = ? ;";
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(1,$uname);
			$stmt->execute();
			if ($stmt->rowCount()>0){
				echo "<fieldset><legend></legend>";
				while($row =$stmt->fetch()){
				echo "Name: ".$row["name"]."<br>"."<br>Email: ".$row["email"]."<br><br>Total threads: ".$row["total"];
					$sql2 = "SELECT contentType, image FROM userImages where user_id=?";
					$stmt = $conn->prepare($sql2);
					$stmt->bindValue(1,$uname);
					$stmt->execute();
					if($stmt->rowCount()>0){
						$stmt->bindColumn(1, $type);
						$stmt->bindColumn(2, $image);
				    		while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
							}
						echo '<p>Profile picture</p><img src="data:image/'.$type.';base64,'.base64_encode($image).'"/>';
						}
					
					
					
					$str = "</fieldset>";
					echo $str;

	}
			}
			else if ($stmt->rowCount()==0){
				echo "no user";
			}
		}
		else {
			echo "empty param";
		}
	}
		else {
			echo "nothing is set".$_SESSION["uid"].",".$_SESSION["state"];
		}
$conn = null;
?>