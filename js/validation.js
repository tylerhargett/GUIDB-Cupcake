function validateRegistration() {
	var mlYes = document.getElementById("yes").checked;
	var mlNo = document.getElementById("no").checked;
	var fname = document.forms["reg"]["fname"].value;
	var lname = document.forms["reg"]["lname"].value;
	var email = document.forms["reg"]["email"].value;
	var pw = document.forms["reg"]["pw"].value;
	var tele = document.forms["reg"]["tele"].value;
	var addr = document.forms["reg"]["addr"].value;
	var city = document.forms["reg"]["city"].value;
	var state = document.forms["reg"]["state"].value;
	var zip = document.forms["reg"]["zip"].value;
	var submit = true;
	
	tele = tele.replace(/\D/g,'');
	zip = zip.replace(/\D/g,'');
	
	if (!mlYes && !mlNo) {
  		document.getElementById("err1").innerHTML = "Select an option";
  		submit = false;
  	}
  	else {
	  	document.getElementById("err1").innerHTML = "";
	  	submit = true;
  	}
  	
  	if (fname == null || fname == "") {
  		document.getElementById("err2").innerHTML = "Enter your first name";
  		submit = false;
  	}
  	else {
	  	document.getElementById("err2").innerHTML = "";
	  	submit = true;
  	}
  	
  	if (lname == null || lname == "") {
  		document.getElementById("err3").innerHTML = "Enter your last name";
  		submit = false;
  	}
  	else {
	  	document.getElementById("err3").innerHTML = "";
	  	submit = true;
  	}
  	
  	if(email == null || email == "") {
	  	document.getElementById("err4").innerHTML = "Enter an email address";
  		submit = false;
	}
	  	else if ( !validEmail(email) ) {
	  		document.getElementById("err4").innerHTML = "Enter a valid email address";
	  		submit = false;
	  	}
	  	else {
	  		document.getElementById("err4").innerHTML = "";
	  		submit = true;
  		}
  	
  	if(pw == null || pw == "") {
	  	document.getElementById("err5").innerHTML = "Enter a password";
  		submit = false;
  	}
	  	else if (pw.length < 8) {
	  		document.getElementById("err5").innerHTML = "PW must be at least 8 chars long";
	  		submit = false;
	  	}
	  	else {
	  		document.getElementById("err5").innerHTML = "";
	  		submit = true;
  		}
  	
  	if (tele == null || tele == "") {
  		document.getElementById("err6").innerHTML = "Enter a telephone address";
  		submit = false;
  	}
  		else if( tele.length != 10) {
	  		document.getElementById("err6").innerHTML = "Enter a valid telephone number";
  			submit = false;
  		}
  		else {
	  		document.getElementById("err6").innerHTML = "";
	  		submit = true;
  		}
  	
  	if (addr == null || addr == "") {
  		document.getElementById("err7").innerHTML = "Enter an address";
  		submit = false;
  	}
  	else {
	  	document.getElementById("err7").innerHTML = "";
	  	submit = true;
  	}
  	
  	if (city == null || city == "") {
  		document.getElementById("err8").innerHTML = "Select a city";
  		submit = false;
  	}
  	else {
	  	document.getElementById("err8").innerHTML = "";
	  	submit = true;
  	}
  	
  	if (state == null || state == "") {
  		document.getElementById("err9").innerHTML = "Select a state";
  		submit = false;
  	}
  	else {
	  	document.getElementById("err9").innerHTML = "";
	  	submit = true;
  	}
  	
  	if (zip == null || zip == "") {
  		document.getElementById("err10").innerHTML = "ZIP must be 5 or more numbers long";
  		submit = false;
  	}
  		else {
	  		document.getElementById("err10").innerHTML = "";
	  		submit = true;
  		}
  		
  	return submit;
}

function validEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}