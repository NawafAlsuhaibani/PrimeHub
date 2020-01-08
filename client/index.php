<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
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
				<?php include 'homepage.php'; ?>
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