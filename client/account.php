<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
?>
<?php
if (isset($_SESSION['accid']) && !empty($_SESSION['accid']) ){
	$accid = $_SESSION['accid'];
    $sql = ("SELECT `name`,`username`,`created_date`, COUNT(thread.thr_content) as total FROM users,thread WHERE users.user_id = ? and users.user_id=thread.user_id");
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1,$accid);
	$stmt->execute();
	if($stmt->rowCount()>'0'){
		while($row =$stmt->fetch()){
			echo "Name: ".$row["name"]."<br>usename: ".$row["username"]."<br>created on: ".$row["created_date"]."<br>Number of threads: ".$row["total"];
	}
	}else {
		echo "something is wrong";
	}
	$sql1 = ("SELECT thread.date_created,thread.user_id,thread.thr_content,category.cat_name, thread.thr_id FROM category,thread WHERE thread.user_id =? and category.cat_id=thread.cat_id;");
	$stmt1 = $conn->prepare($sql1);
	$stmt1->bindValue(1,$accid);
	$stmt1->execute();
	if($stmt1->rowCount()>'0'){
		echo "<table><tr><th>Category</th><th>Thread</th><th>Date created</th></tr>";
		while($row1 =$stmt1->fetch()){
			echo "<tr><td>".$row1["cat_name"]."</td><td><a class='userthr' href='thread.php?thr_id=".$row1['thr_id']."' id=".$row1['thr_id'].">".$row1['thr_content']."</a></td><td>".$row1["date_created"];
		}
		
	}
  }
$conn = null;
?>