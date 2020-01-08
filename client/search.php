<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
	
}
?>
<?php
require_once ('../server/connection/config.php');
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Home Page</title>
</head>

<body>
    <nav id="fixednav">
        <!--fixed navigation bar-->
        <a class="leftside" href="index.php">Prime Hub</a>
        <a class="leftside" href="create.php">create</a>
        <a class="leftside" href="trend.php">Trending</a>
        <a class="leftside" href="new.php">New</a>
        <form method="post" action="search.php">
        <input class="leftsidebar" type="text" placeholder="Search" name="txt">
        <input type="submit" value="search" class="leftsidebar">
        </form>
        <?php
        if (isset($_SESSION["state"]) && $_SESSION["state"]===1) {
            echo "<a class='rightside' href='../server/logout.php' >logout</a>";
            echo "<a class='rightside' href='pro.php' >Profile</a>";
        }
        else{
            echo "
        <a class='rightside' href='login.html'>Login</a>
        <a class='rightside' href='signup.html'>Sign up</a>";
        }
        ?>
        
    </nav>
    <div class="flex-container">
        <!-- everthing inside this div -->
        <section id="content">
            <!-- actual content here -->
            <table>
            <tr><th>Category</th><th>Thread</th></tr>
			<?php
				$txt = $_POST["txt"];
				if(!ctype_space($txt)){
					$str = "%".$_POST["txt"]."%";
					$sql = "SELECT thread.thr_id ,thread.thr_content ,category.cat_name  from category , thread WHERE category.cat_id = thread.cat_id and (thread.thr_content LIKE ? OR category.cat_name LIKE ?) order by category.cat_name ASC ,thread.thr_content;";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(1,$str);
					$stmt->bindParam(2,$str);
					$stmt->execute();
					$result = $stmt->fetchAll();
					foreach($result as $row){
						$thrid = $row['thr_id'];
						$thrcont = $row['thr_content'];
						echo "<tr><td>".$row['cat_name']."</td><td><a class='tablelink' href='thread.php?thr_id=$thrid' id=$thrid>$thrcont</a></td><tr>";
					}
	}
				else{
						echo "<tr><td>No result</tr></td>";
					}
$conn = null;
				?>	
       		</table>
        </section>
        <section id="ad">
            <!-- advertisment goes here -->
            <div id="left-bar">
                <a class="advertisemen" href="">advertisemen1</a>
                <a class="advertisemen" href="">advertisemen2</a>
                <a class="advertisemen" href="">advertisemen3</a>
                <a class="advertisemen" href="">advertisemen4</a>
                <a class="advertisemen" href="">advertisemen4</a>
                <a class="advertisemen" href="">advertisemen5</a>
                <a class="advertisemen" href="">advertisemen1</a>
                <a class="advertisemen" href="">advertisemen1</a>
                <a class="advertisemen" href="">advertisemen1</a>
                <a class="advertisemen" href="">advertisemen1</a>
                <a class="advertisemen" href="">advertisemen1</a>
                <a class="advertisemen" href="">advertisemen1</a>
			</div>
        </section>
    </div>
<footer>
<p>By accessing or using PrimeHub. website, you agree to the terms of this Online Privacy Policy, as outlined below. If you do not agree to these terms, please do not access or use this site.</p>
</footer>
</body>

</html>