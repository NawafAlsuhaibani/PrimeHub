<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
if (!isset($_SESSION["state"]) || !isset($_SESSION["uid"])) {
		header("Location: login.html");
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="application/javascript" src="thrdel.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title></title>
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
       <section id="ad1">
            <!-- advertisment goes here -->
            <div id="left-bar">
                <a class="advertisemen" href="userthread.php">My threads</a>
                <a class="advertisemen" href="passwordtable.php">change password</a>
                <a class="advertisemen" href="pro.php">profile</a>
			</div>
        </section>
        <!-- everthing inside this div -->
        <section id="content">
            <!-- actual content here -->
            <table id="output">
             <tr><th>Category</th><th>Thread</th><th>Date created</th><th>Action</th></tr>
</table>
       
        </section>
    </div>
<footer>
<p>By accessing or using PrimeHub. website, you agree to the terms of this Online Privacy Policy, as outlined below. If you do not agree to these terms, please do not access or use this site.</p>
</footer>
<script>
		listThread();

</script>
</body>

</html>