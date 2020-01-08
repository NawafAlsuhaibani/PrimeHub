<?php
require_once ('../server/connection/config.php');
try {
$conn = new PDO("mysql:host=localhost; dbname=".cosc360."" , DBUSER, DBPASS);
	}
catch(PDOException $e) {
	die("error" . $e);
}
?>
<?php
if(isset($_POST["txt"])){
	$str = $_POST["txt"];
	$sql = "SELECT thread.thr_content ,category.cat_name  from category , thread WHERE category.cat_id = thread.cat_id and (thread.thr_content LIKE '%sport%' OR category.cat_name LIKE '%sport%') order by category.cat_name ASC ,thread.thr_content;";
	$result = $conn->query($sql);
	while($row =$result->fetch()){
		echo $row["thr_content"] . "<br>" . $row["cat_name"]. "<br>";
	}
}
else {
	echo "no";
}
?>