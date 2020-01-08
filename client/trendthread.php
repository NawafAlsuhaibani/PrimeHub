<?php // connection 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
require_once ('../server/connection/config.php');
?>
<?php
$sqlcatid = $conn->query("select cat_id,date_created from category order by cat_name asc");
//$sqlcatidarray = $sqlcatid->fetchAll();
//print_r($sqlcatidarray);
while($row = $sqlcatid->fetch()){ // categories id's!
	$id = $row['cat_id'];
	$sqlcatname = $conn->query("select cat_name from category where cat_id = $id ORDER BY date_created DESC");
	while($row1 = $sqlcatname->fetch()){ // category name sql!
		$catname = $row1['cat_name'];
		echo "<tr><td><div class='newcat'>";
		echo "<p class='cat'>$catname</p>";
		echo "<section class='spacer'></section>";
		$sqlthr = $conn->query("select thr_id,thr_content,user_id from thread where cat_id = $id ORDER BY `click_num` DESC");
			while($row2 = $sqlthr->fetch()){ // thread contents!
			$thrcont = $row2['thr_content'];
			$userid = $row2['user_id'];
			$thrid = $row2['thr_id'];
			echo "<p class='thr'><a href='thread.php?thr_id=$thrid' id=$thrid>$thrcont</a></p>";
			// add details of users! <span class=info></span> add spacer after it
			$sqlcomm =$conn->query( "SELECT username, thread.date_created from users , thread where thread.user_id = $userid AND users.user_id=thread.user_id and thr_id = $thrid");
				while($row3 = $sqlcomm->fetch()){ // comments contents!
				echo "<span class=info>created by <a class=userinfo href='userprofile.php?accid=$userid' id=$userid>".$row3["username"]." </a>created at ".$row3["date_created"]."</span>";
				}
		}
	}	
		echo "</div></td></tr>";
	}
$conn = null;
?>