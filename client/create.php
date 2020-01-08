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
    <title>create</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/verify1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
		     <section id="content">
                <?php
		if (isset($_SESSION["state"]) && $_SESSION["state"]===1 && isset($_SESSION["uid"])) {// user sined in
			?>
			   <div>
          <form method="post" action="createcat.php" id="regform1">
            <fieldset>
                <legend>creating new category</legend>
                <p>
                    <input type="text" class="inp" name="newcat" placeholder="category">
                </p>
                <input type="submit" value="creat">
            </fieldset>
        </form>	
               </div>
               			   <div>
               			<form method="post" action="createthr.php" id="regform2">
            <fieldset>
                <legend>creating new thread</legend>
                <p>Category:
                	<select name="catname">
                		<?php include 'listcat.php'; ?>
                	</select>
                </p>
                <p>
                   <textarea rows="20" cols="100" name="comment" class="inp"></textarea>
                </p>
                <input type="submit" value="creat">
            </fieldset>
        </form>	
               </div>
			<?php
		}
		else{
			?>
			 <a href="login.html"><h3>Please Login</h3></a>
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