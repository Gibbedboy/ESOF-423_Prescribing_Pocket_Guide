function submitTester(inField, e) {
	var charCode;
	if(e && e.which)
	{
		charCode = e.which;
	}
	else if (window.event)
	{
		e = window.event;
		charCode = e.keyCode;
	}

	if (charCode == 13) //enter key
	{
		login();
	}
	
}

function login(){
	var name = document.forms["name"]["username"].value;
	var pass = document.forms["pass"]["password"].value;
	if(pass == "1"){
	   document.location.href = "main.php";
	   window.location.href = "main.php";
	}else{
	   alert("Incorrect Password");
	}
}