window.addEventListener("load" , function(){
	"use strict";
	document.getElementById("mainForm").addEventListener("submit" , function(e) {
    e.preventDefault(); // to stop the form from submitting 
	var pass1 = document.getElementById("password").value;
	var pass2 = document.getElementById("password-check").value;
	if(pass1 == pass2){
		e.target.submit();
	}
	else{
	alert("passwords are not matched");
		}
});
});