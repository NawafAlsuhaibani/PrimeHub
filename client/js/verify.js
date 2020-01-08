function login(e) {
	"use strict";
	var val1 = document.getElementsByClassName("inp")[0].value;
	var val2 = document.getElementsByClassName("inp")[1].value;
	if(val1 ===""){
		alert("please enter your email");
	}
	else if (val2 ===""){
		alert("please enter your password");
	}
	else {
		e.target.submit();
	}

}
function passrec(e) {
	"use strict";
	var val1 = document.getElementsByClassName("inp")[0].value;
	if (val1==="") {
		alert("please enter your email!");
	}
	else{
		e.target.submit();
	}
}
function signup(e) {
	"use strict";
	var fullname = document.getElementsByName("fullname")[0].value;
	var username = document.getElementsByName("username")[0].value;
	var email = document.getElementsByName("email")[0].value;
	var pass = document.getElementsByName("pass")[0].value;
	var condition = document.getElementsByName("condition")[0].checked;
	var img = $('#regform input[type=file]').get(0).files.length;
	var size=$('#fileToUpload')[0].files[0].size;
	if(fullname===""){
		alert("Enter full name");
	}
	else if (username===""){
		alert("Enter username");
	}
	else if (email===""){
		alert("Enter email");
	}
	else if (pass===""){
		alert("Enter password");
	}
	else if (condition===false){
		alert("accept the terms");
	}
	else if (img===0){
		alert("upload an image!");
	}
	else if (size>10000000){
		alert("image is large");
	}
	else if (val1===0){
		alert("Not Allowed Extension");
	}
	else {
		e.target.submit();
	}
	

}
var val1 =0;
window.addEventListener("load" , function(){
	"use strict";
	(function($) {
    $.fn.checkFileType = function(options) {
        var defaults = {
            allowedExtensions: [],
            success: function() {},
            error: function() {}
        };
        options = $.extend(defaults, options);

        return this.each(function() {

            $(this).on('change', function() {
                var value = $(this).val(),
                    file = value.toLowerCase(),
                    extension = file.substring(file.lastIndexOf('.') + 1);

                if ($.inArray(extension, options.allowedExtensions) == -1) {
                    options.error();
                    $(this).focus();
                } else {
                    options.success();

                }

            });

        });
    };

})(jQuery);

$(function() {
    $('#fileToUpload').checkFileType({
        allowedExtensions: ['jpg', 'jpeg','gif','png'],
        success: function() {
            val1 =1;
        },
        error: function() {
			val1 =0;
            alert('Not Allowed Extension');
        }
    });

});
document.getElementById("regform").addEventListener("submit" , function(e) {
    e.preventDefault(); // to stop the form from submitting 
		if(window.location.href.indexOf("login") > -1) {
		login(e);
	}
		if(window.location.href.indexOf("passrec") > -1) {
		passrec(e);
	}
		if(window.location.href.indexOf("signup") > -1) {
		signup(e);
	}
});
});




/*	var alltextinput = document.getElementById("textfield").querySelectorAll("input");
	var len = alltextinput.length;
	var val = "";
	var ok = false;
	var chbox = document.getElementById("regform").querySelectorAll("input[type=checkbox]")[0].checked;
	while(ok===false) {
		for(var i =0; i<len; i++) {
		val = alltextinput[i].value;
		if(val===""){
		alltextinput[i].classList.add("empty");
		alert(alltextinput[i].name + " cant be empty");
			ok=false;
		}
		if(val!=="") {
			alltextinput[i].classList.remove("empty");
			ok=true;
			
		}
	}
	if(chbox!==true){
		 alert("please accept the term!");
		ok=false;
	}
		else{
			ok=true;
		}
		}
	
 		e.target.submit();*/