<?php
$str1 ="";
require_once ('connection/config.php');
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST["fullname"])&&isset($_POST["username"])&&isset($_POST["pass"])&& is_uploaded_file($_FILES["fileToUpload"]['tmp_name'])){
		if(!ctype_space($_POST["fullname"])&& !ctype_space($_POST["username"])&& !ctype_space($_POST["pass"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			$fname = $_POST["fullname"];
			$uname = $_POST["username"];
			$email = $_POST["email"];
			$pass = md5($_POST["pass"]);
			$sql = "select * from users where username = ? or email = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(1,$uname);
			$stmt->bindValue(2,$email);
			$stmt->execute();
			if ($stmt->rowCount()>0){
				$str =  "user already exists whith this username / email";
				header("Location: ../client/error.php?error=$str");
			}
			else {
			$sqlinsert = "INSERT INTO users (name,username,email,password) VALUES (?,?,?,?);";
				$stmt = $conn->prepare($sqlinsert);
				$stmt->bindValue(1,$fname);
				$stmt->bindValue(2,$uname);
				$stmt->bindValue(3,$email);
				$stmt->bindValue(4,$pass);
				$stmt->execute();
			if($stmt->rowCount()==1){
				$sql = "select user_id from users where username = ?";
			$stmt1 = $conn->prepare($sql);
			$stmt1->bindValue(1,$uname);
			$stmt1->execute();
				if($stmt1->rowCount()==1){
					$row = $stmt1->fetch();
					$uid= $row["user_id"];
					$path = "";
					$imageFileType="";
					$status = imgcheck($uname);
					if($status==TRUE){
						$sql1 = "INSERT INTO userImages (user_id, contentType, image) VALUES(?,?,?)";
						$stmt2 = $conn->prepare($sql1);
						$imagedata = file_get_contents($path);
						$stmt2->bindValue(1,$uid);
						$stmt2->bindValue(2,$imageFileType);
						$stmt2->bindValue(3,$imagedata,PDO::PARAM_LOB);
						$stmt2->execute();
						if($stmt2->rowCount()==1){
							header("Location: ../client/regsucc.html");
						}
						else {
							$str = "error inserting the img";
							header("Location: ../client/error.php?error=$str");
						}
					}
					else
					{
						global $str1;
						header("Location: ../client/error.php?error=$str1");
					}
			}
				else {
					$str = "user does not exists";
					header("Location: ../client/error.php?error=$str");
				}
				
			}
				else{
					$str =  "error creating the account";
					header("Location: ../client/error.php?error=$str");
				}
			}
	}
	else {
		$str =  "param are not set";
		header("Location: ../client/error.php?error=$str");
		
	}	
	}
	else {
		$str =  "bad data,please try again";
		header("Location: ../client/error.php?error=$str");
	}
	}
else {
		$str =  "Not post request";
		header("Location: ../client/error.php?error=$str");
	}
	



function imgcheck($username){
	global $str1;
//$target_dir = "uploads/";
$target_dir = "../file_uploads/";
$t=time();
$target_file = $target_dir.$t.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
global $imageFileType;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $str1 =  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $str1 =  "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    $str1 =  "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    $str1 =  "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) {
    $str1 =  "Sorry, only JPG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	return false;
    $str1 =  "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
	else {
	global $path;
	$path = $target_file;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      return true; 
    } else {
        return false;
    }
}
}
$conn = null;









/*$status = session_status();
if($status == PHP_SESSION_NONE){
    session_start();
}
require_once ('connection/config.php');
?>
<?php

$fname = $_POST["fullname"];
$uname = $_POST["username"];
$email = $_POST["email"];
$pass = md5($_POST["pass"]);
$sqlinsert = "INSERT INTO users (name,username,email,password) VALUES (?,?,?,?);";
if(filter_var($email , FILTER_VALIDATE_EMAIL) && !ctype_space($fname) && !ctype_space($email) && !ctype_space($uname) && !ctype_space($pass)){
	$stmt = $conn->prepare($sqlinsert);
	$stmt->bindValue(1,$fname);
	$stmt->bindValue(2,$uname);
	$stmt->bindValue(3,$email);
	$stmt->bindValue(4,$pass);
	$stmt->execute();
	if($stmt==TRUE){
		header("Location: ../client/regsucc.html");
	}
	else {
		header("Location: ../client/regfailed.html");
	}
}
else {
	echo "error";
}
$conn = null;*/
?>