<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
try {
$conn = new PDO("mysql:host=localhost; dbname=cosc360" , DBUSER, DBPASS);
	}
catch(PDOException $e) {
	die("error" . $e);
}
?>
<?php
if (isset($_SESSION['thr_id']) && !empty($_SESSION['thr_id']) ){
	$thrid = $_SESSION['thr_id'];
    $sql = ("SELECT thr_content FROM thread WHERE thr_id = ?");
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1,$thrid);
	$stmt->execute();
	if($stmt==TRUE){
		while($row =$stmt->fetch()){
	echo "<div id=thread><p>".$row["thr_content"]."</p> </div>";
	}
	}else {
		
	}
  }
?>