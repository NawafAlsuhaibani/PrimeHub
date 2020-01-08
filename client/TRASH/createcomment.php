<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('connection/config.php');
try {
$conn = new PDO("mysql:host=localhost; dbname=cosc360" , DBUSER, DBPASS);
	}
catch(PDOException $e) {
	die("error" . $e);
}
?>
<?php



?>