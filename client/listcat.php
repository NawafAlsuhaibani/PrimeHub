<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
?>
<?php
$sql = "SELECT cat_id , cat_name FROM category";
$stmt = $conn->prepare($sql);
$stmt->execute();
if($stmt==TRUE){
	while($row =$stmt->fetch()){
			echo "<option value=".$row["cat_id"].">".$row["cat_name"]."</option>";
	}
}
$conn = null;
?>