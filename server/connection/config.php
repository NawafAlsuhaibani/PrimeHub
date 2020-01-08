<?php 
define('DB_HOST' , 	'localhost');
define('DBNAME' , 'db_49293153');
define('DBUSER' , '49293153');
define('DBPASS' , 'nawaf49293153');

//define('DB_HOST' , 	'localhost');
//define('DBNAME' , 'cosc360');
//define('DBUSER' , 'root');
//define('DBPASS' , '');
try {
$conn = new PDO("mysql:host=localhost; dbname=".DBNAME."" , DBUSER, DBPASS);
	}
catch(PDOException $e) {
	die("error" . $e);
}
?>