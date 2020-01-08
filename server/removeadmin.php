<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
?>
<?php
if (isset($_SESSION["state"]) && $_SESSION["state"]===2 ) {
	if(isset($_POST["uid"]) && !ctype_space($_POST["uid"])){

	}
}

$conn = null;


?>