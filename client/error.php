<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Error page</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav id="fixednav">
        <!--fixed navigation bar-->
        <a class="leftside" href="index.php">Prime Hub</a>
        <a class="leftside" href="create.php">create</a>
        <a class="leftside" href="">Trending</a>
        <a class="leftside" href="">New</a>
        <form method="post" action="search.php">
        <input class="leftsidebar" type="text" placeholder="Search" name="txt">
        <input type="submit" value="search" class="leftsidebar">
        </form>
        <a class="rightside" href="login.html">Login</a>
        <a class="rightside" href="signup.html">Sign up</a>
    </nav>
    <div class="flex-container">
       <section id="content">
       <?php
		   if(isset($_GET["error"])){
			   ?>
			   <p> <?php echo $_GET["error"]; ?></p>
			   <?php
		   }
	    ?>
        </section>
        <section id="ad">
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
<p>By accessing or using PrimeHub. website, you agree to the terms of this Online Privacy Policy, as outlined below. If you do not agree to these terms, please do not access or use this site.</p>
</footer>
</body>
</html>