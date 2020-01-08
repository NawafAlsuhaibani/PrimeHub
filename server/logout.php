<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
unset($_SESSION["state"]);
unset($_SESSION["uid"]);
echo "Logged out successfully ...Redirecting";
header("Refresh: 2; URL = ../client/index.php");
?>