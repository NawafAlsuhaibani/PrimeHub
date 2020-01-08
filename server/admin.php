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
    <link rel="stylesheet" href="../client/css/style.css">
    <script type="application/javascript" src="adminajax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title></title>
</head>

<body>
    <nav id="fixednav">
    <a class='rightside' href='../server/logout.php' >logout</a>
    </nav>
    <div class="flex-container">
        <!-- everthing inside this div -->
        <section id="ad1">
            <!-- advertisment goes here -->
            <div id="left-bar">
                <button id="listusers" >List users</button>
                <button id="listthreads" >List threads</button>
                <input type="text" id="textsearch"><button id="search">search</button>
			</div>
        </section>
        <section id="content-1">
            <!-- actual content here -->
            <table id="output1">
            </table>
        </section>
        
    </div>
<footer>
<p>By accessing or using PrimeHub. website, you agree to the terms of this Online Privacy Policy, as outlined below. If you do not agree to these terms, please do not access or use this site.</p>
</footer>
<script>
$(document).ready(function() {
  $('#listusers').click(function(){
	  $('#output1').empty();
    listusers();
  });
	$('#search').click(function(){
		var str = $("#textsearch").val();
	  	  if(str!=""){
		   $('#output1').empty();
		  listusers1(str);
	  }
  });
  $('#listthreads').click(function(){
	  $('#output1').empty();
    listthreads();
  });
});
</script>
</body>

</html>