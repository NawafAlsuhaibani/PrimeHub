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
    <title>Admin Page</title>
</head>

<body>
    <nav id="fixednav">
        <!--fixed navigation bar-->
        <?php
		if (isset($_SESSION["state"]) && $_SESSION["state"]===1) {
			echo "<a class='rightside' href='../server/logout.php' >logout</a>";
			echo "<p class='rightside' >Hello Admin</p>";
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
			<select name="search" id="search">Search by
			<option value="1">user Id</option>
			<option value="2">username</option>
			<option value="3">thread</option>
			<option value="4">category</option>
			</select><input type="text"><br>
			<button id="allusers">All users</button>
	        <button id="allthr">All Thread</button>
	        <button id="allcat">All categories</button>
        </section>
    </div>
</body>

</html>