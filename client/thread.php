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
<style>
	.comment-info {
 	font-size: 0.89em;
	color: #9C9C9C;
	margin-bottom: 5px;
	margin-top: 5px;
}
	</style>
<meta charset="UTF-8">
<title>thread</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--<script type="text/javascript" src="js/verify.js"></script>-->
<script src="js/jquery-3.2.1.min.js"></script>
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
		include 'showthread.php'; 
		?>
     <section class='spacer'></section>
      <div class="comment-form-container">
      <?php
		if (isset($_SESSION["state"]) && $_SESSION["state"]===1 && isset($_SESSION["uid"])) {// user sined in
		?>
         <form id="frm-comment">
            <div class="input-row">
                <input type="hidden" name="comment_id" id="commentId" placeholder="Name" /> 
            </div>
            <div class="input-row">
                <textarea class="input-field" type="text" name="comment" id="comment" placeholder="Add a Comment"></textarea>
            </div>
            <div>
            <input type="button" class="btn-submit" id="submitButton" value="Publish"/>
            <div id="comment-message">
            Comment Added Successfully!
            </div>
            </div>
        </form>
               <?php
		}
			?>
		</div>
      <div id="output"><!-- comments here! --></div> 
		<script>
		function postReply(commentId) {
                $('#commentId').val(commentId);
                $("#comment").focus();
            }
            $("#submitButton").click(function () {
				
				var comm = $("#comment").val();
				if(comm!=""){
                var str = $("#frm-comment").serialize();

                $.ajax({
                    url: "comment-add.php",
                    data: str,
                    type: 'post',
                    success: function (response)
                    {
                        var result = eval('(' + response + ')');
                        if (response)
                        {
                        	$("#comment-message").show();
                            $("#comment").val(""); // empty comment section
                            $("#commentId").val(""); // empty comment id
                     	   listComment();
                        } else
                        {
                            alert("Failed to add comments !");
                            return false;
                        }
                    }
                });
           }
			else{
				alert("comment cannot be empty")
			}});
            
            $(document).ready(function () {
				$("#comment-message").hide();
				//setInterval(function(){listComment()},10);
            	   listComment();
            });

            function listComment(){
                $.post("comment-list.php",
                        function (data) {
                               var data = JSON.parse(data);     
                            var comments = "";
                            var replies = "";
                            var item = "";
                            var parent = -1;
                            var results = new Array();

                            var list = $("<ul class='outer-comment'>");
                            var item = $("<li>").html(comments);

                            for (var i = 0; (i < data.length); i++)
                            {
                                var commentId = data[i]['comment_id'];
                                parent = data[i]['parent_comment_id'];

                                if (parent === "0") // if no parent
                                {
                                    comments = "<div class='comment-row'><div class='comment-info'><span class='commet-row-label'>from </span><span class='posted-by'>" +data[i]['comment_sender_name']+"</span> <span class='commet-row-label'>at</span> <span class='posted-at'>"+data[i]['date']+"</span></div><div class='comment-text'>"+data[i]['comment']+"</div>"+"<div><button class='btn-reply' onClick='postReply("+commentId+")'>Reply</button></div>"+"</div>";
                                    var item = $("<li>").html(comments);
                                    list.append(item);
                                    var reply_list = $('<ul>');
                                    item.append(reply_list);
                                    listReplies(commentId, data, reply_list);
                                }
                            }
                            $("#output").html(list);
                        });
            }

            function listReplies(commentId, data, list) {
				"use strict";
                for (var i = 0; (i < data.length); i++)
                {
                    if (commentId == data[i].parent_comment_id)
                    {
                        var comments = "<div class='comment-row'>"+
                        " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                        "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                        "<div><button class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>Reply</button></div>"+
                        "</div>";
                        var item = $("<li>").html(comments);
                        var reply_list = $('<ul>');
                        list.append(item);
                        item.append(reply_list);
                        listReplies(data[i].comment_id, data, reply_list);
                    }
                }
            }
		</script>
        </section>
        <section id="ad">
                <a class="advertisemen" href="">advertisemen1</a>
                <a class="advertisemen" href="">advertisemen2</a>
                <a class="advertisemen" href="">advertisemen3</a>
                <a class="advertisemen" href="">advertisemen4</a>
                <a class="advertisemen" href="">advertisemen4</a>
                <a class="advertisemen" href="">advertisemen5</a>
        </section>
	</div>
	<footer>
<p>By accessing or using PrimeHub. website, you agree to the terms of this Online Privacy Policy, as outlined below. If you do not agree to these terms, please do not access or use this site.</p>
</footer>
</body>

</html>