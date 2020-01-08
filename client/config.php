<?php
$host = "localhost";
$database = "lab9";
$user = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=localhost; dbname=".$database."" , $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>