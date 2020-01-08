window.addEventListener("load" , function(){
	"use strict";
document.getElementById("regform1").addEventListener("submit" , function(e) {
	e.preventDefault();
	create1(e);
});
document.getElementById("regform2").addEventListener("submit" , function(e) {
	e.preventDefault();
	create2(e);
});
});
function create1(e) {
	"use strict";
	var val1 = document.getElementsByName("newcat")[0].value;
	if(val1 ===""){
		alert("please enter category name");
	}
	else {
		e.target.submit();
	}
}
function create2(e) {
	"use strict";
		var val1 = document.getElementsByName("comment")[0].value;
		if(val1 ===""){
		alert("please enter a thread");
	}
	else {
		e.target.submit();
	}
}
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