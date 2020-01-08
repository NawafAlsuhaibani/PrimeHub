<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
if (!isset($_SESSION["uidrec"])) {
		header("Location: login.html");
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="js/validate.js"></script>
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
    </nav>
    <div class="flex-container">
        <!-- everthing inside this div -->

        <section id="content-1">
            <!-- actual content here -->
            <form method='post' action='changepassrecstatus.php' id='mainForm'>
  Old Password:<br>
  <input type='password' name='oldpassword' id='oldpassword' class='required'>
  <br>
  New Password:<br>
  <input type='password' name='newpassword' id='password' class='required'>
  <br>
  Re-enter New Password:<br>
  <input type='password' name='newpassword-check' id='password-check' class='required'>
  <br><br>
  <input type='submit' value='Update Password'>
</form>
        </section>
        
    </div>
<footer>
<p>By accessing or using PrimeHub. website, you agree to the terms of this Online Privacy Policy, as outlined below. If you do not agree to these terms, please do not access or use this site.</p>
</footer>
</body>

</html>