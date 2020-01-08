 $(document).ready(function(){
	 "use strict";
	 var val1 = 0;
	 var val2 = 0;
	 $("#unameav").hide();
	 $("#emailav").hide();
	 $("#reg").hide();
	 $('#username').on('input', function() {
		 var username = $(this).val();
    $.ajax({
      url:'username-email-check.php',
      method:"POST",
      data:{username:username},
      success:function(data)
      {
       if(data !== '0')
       {
		   $("#unameav").show();
		   val1 = 0;
		   check();
       }
       else
       {
		$("#unameav").hide();
		  val1 = 1;
		   check();
       }
      }
     });
});
	 $('#email').on('input', function() {
		 var email = $(this).val();
    $.ajax({
      url:'username-email-check.php',
      method:"POST",
      data:{email:email},
      success:function(data)
      {
       if(data !== '0')
       {
		   $("#emailav").show();
		   val2 = 0;
		   check();
       }
       else
       {
		$("#emailav").hide();
		  val2 = 1;
		  check();
       }
      }
     });
});
	 function check(){
		 if(val1===0 || val2 ===0){
			 $("#reg").hide();
		 }
		 else if (val1===1 && val2 ===1){
			 $("#reg").show();
		 }
	 }
 });