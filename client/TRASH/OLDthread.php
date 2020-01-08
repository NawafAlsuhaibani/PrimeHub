<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
?>
<?php
if (isset($_GET['thr_id']) && !empty($_GET['thr_id']) ){
	$_SESSION["thr_id"] = $_GET['thr_id'];
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>thread1</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/verify.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <nav id="fixednav">
        <!--fixed navigation bar-->
        <a class="leftside" href="homepage.php">Prime Hub</a>
        <a class="leftside" href="create.php">create</a>
        <a class="leftside" href="">Trending</a>
        <a class="leftside" href="">New</a>
        <form method="post" action="test.php">
        <input class="leftsidebar" type="text" placeholder="Search" name="txt">
        <input type="submit" value="search" class="leftsidebar">
        </form>
        <?php
		if (isset($_SESSION["state"]) && $_SESSION["state"]===1) {
			echo "<a class='rightside' href='../server/logout.php' >logout</a>";
		}
		else{
			echo "
		<a class='rightside' href='login.html'>Login</a>
        <a class='rightside' href='signup.html'>Sign up</a>";
		}
		?> 
    </nav>
     <div class="flex-container">
    <section id="content">
       <?php include 'show.php'; 
		if ($_SESSION["state"]===1) {// user sined in
		?>
         <form method="post" action="createcomment.php" id="regform">
       	<textarea name="text" id="textarea" cols="30" rows="10"></textarea><br>
       	<input type="submit" value="add comment">
       </form>
       <?php
		}
			?>
        </section>
        <section id="ad">
        	<p class="advertisemen">advertisemen1</p>
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
        </section>
	</div>
	<footer>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem cupiditate vel quo quisquam porro animi quibusdam dolore aperiam! Aliquam deleniti iure veniam dicta quod laudantium molestias, beatae facere delectus dolor aperiam error, dolorem sequi praesentium officiis inventore! Atque, necessitatibus ea ipsam aliquid, est perspiciatis nulla consectetur, cupiditate iste suscipit quisquam.</p>
</footer>
</body>

</html>