<?php 
define('DB_HOST' , 	'DB_HOST');
define('DBNAME' , 'DBNAME');
define('DBUSER' , 'DBUSER');
define('DBPASS' , 'DBPASS');

//define('DB_HOST' , 	'DB_HOST');
//define('DBNAME' , 'DBNAME');
//define('DBUSER' , 'DBUSER');
//define('DBPASS' , 'DBPASS');
try {
$conn = new PDO("mysql:host=localhost; dbname=".DBNAME."" , DBUSER, DBPASS);
	}
catch(PDOException $e) {
	die("error" . $e);
}
?>
