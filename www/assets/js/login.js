function submitTester(elem, e) {
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
		if(elem.name == "pass"){
			login();
		}
		else if(elem.name == "passSignup"){
			signup();
		}
	}
}

function login(){
	var name = document.forms["name"]["username"].value;
	var pass = document.forms["pass"]["password"].value;
	$.ajax({
		type: "POST",
		url: "includes/userLogin.php",
		data: {"user": name, "pass": pass},
		success: function(result){
			if(result == 0){
				document.location.href = "main.php";
				window.location.href = "main.php";
			}
			else if(result ==1){
				alert("Incorrect Username or Password");
			}
			else{
				alert(result);
			}
		}
	});
}

function signup(){
	var name = document.forms["name"]["username"].value;
	var pass = document.forms["passSignup"]["password"].value;
	var pass2 = document.forms["passSignup"]["repassword"].value;
	
	if(pass != pass2){
		alert("Passwords did not match");
		return;
	}
	$.ajax({
		type: "POST",
		url: "includes/addUser.php",
		data: {"U_ID": name, "pass": pass, "username": name},
		success: function(result){
			if(result == 0){
				alert("Account Created");
				document.location.href = "main.php";
				window.location.href = "main.php";
			}
			else if(result == 1){
				alert("This username already exists");
			}
			else{
				alert(result);
			}
		}
	});
}


