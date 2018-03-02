//gets info from form and determines if it has been filled out
function addNew(){
	var fName = document.getElementById("fName");
	var mName = document.getElementById("mName");
	var lName = document.getElementById("lName");
	var x = document.getElementById("x");
	if(fName.value && mName.value && lName.value && x.value){
		var name = fName.value + " " + lName.value;
		//call php function using newly patient info
		var id = dbWritePatient(fName.value, mName.value, lName.value, x.value);
		//write this new info to the page
		loadOne(name, id, "Just Now");
		var modal = document.getElementById('myModal');
		modal.style.display = "none";
	}else{
		alert("Please fill out all information fields");
	}
}
//loads a single patient in the list  
function loadOne(inName, inX, inDate){
	var wholeList = document.getElementById("allPatients");
	var patient = document.createElement("li");
	var name = document.createElement("li");
	var x = document.createElement("li");
	var date = document.createElement("li");
	var pList = document.createElement("ul");
	
	var imgDel = delImgCreate();
	var imgEdit = editImgCreate();
	var liDel = document.createElement("li");
	var liEdit = document.createElement("li");
	liDel.id = "highlightEach";
	liEdit.id = "highlightEach";
	liDel.appendChild(imgDel);
	liEdit.appendChild(imgEdit);
	
	name.appendChild(document.createTextNode(inName));
	x.appendChild(document.createTextNode(inX));
	date.appendChild(document.createTextNode(inDate));
	pList.appendChild(liDel);
	pList.appendChild(liEdit);
	pList.appendChild(name);
	pList.appendChild(x);
	pList.appendChild(date);
	
	patient.appendChild(pList);
	patient.id= "person";
	wholeList.appendChild(patient);
}
//recieves single person(patient) and breaks down to load on page
function dbLoadPatient(pat){
	name = pat["fname"] + " " + pat["lname"];
	loadOne(name, pat["P_ID"], pat["updated"]);
	allPatients[pat['P_ID']] = pat;
}
//writes input data into database via php
function dbWritePatient(fName, mName, lName, x){
	var id = uniqueid();
	$.ajax({
		type: "POST",
		url: "includes/addPatient.php",
		data: {"P_ID": id, "fName": fName, "lName": lName, "mName": mName, "x": x},
		success: function(result){
			alert(result);
		}
	});
	return id;
}
function delImgCreate() {
	var img = new Image(25,25);
    img.src = "assets/images/garbage_can.png";
	img.setAttribute("onclick", "deletePatient(this,event);");
    return img;
}
function editImgCreate() {
	var img = new Image(25,25);
    img.src = "assets/images/edit.png";
	img.setAttribute("onclick", "editPatient(this,event);");
	img.id= "editPatient";
    return img;
}
//deletes a patient when delete icon is clicked
function deletePatient(delItem, e){
	//delete li person Item
	var items = delItem.parentElement.parentElement.getElementsByTagName("li");
	var delID = items[3].textContent;
	var delPerson = delItem.parentElement.parentElement.parentElement;
	delPerson.parentNode.removeChild(delPerson);
	//delete from DB
	$.ajax({
		type: "POST",
		url: "includes/removePatient.php",
		data: {"P_ID": delID},
		success: function(result){
			alert(result);
		}
	});
	sideNavHeight();
    return false;
}
function editPatient(editItem, e){
	var modal = document.getElementById('myModal');
	var items = editItem.parentElement.parentElement.getElementsByTagName("li");
	var editID = items[3].textContent;
	document.cookie="P_ID="+editID;
	var editPerson = editItem.parentElement.parentElement.parentElement;
	modal.getElementsByTagName("h1")[0].textContent = "Edit";
	modal.style.display = "block";
	
	var allForms = document.getElementsByClassName("dropdown")[0];
	allForms.style.display = "block";
	var submitBtn = document.getElementById("modalSubmit");
	submitBtn.value = "Save"
	var PHQ9Btn = document.getElementById("modalPHQ9");
	PHQ9Btn.style.display = "block";
	
	var p = new Patient().dbFindConstructor(editID);
	p.loadAnsFromDB(1);
}
//called from patient class to populate past forms dropdown
function addPastForms(patient){
	var allForms = document.getElementById("myDropdown");
	//delete anything in there
	while(allForms.hasChildNodes()){
		allForms.removeChild(allForms.firstChild);
	}
	
	for(var key in patient.ansPHQ9){
		var listItem = document.createElement("a");
		listItem.appendChild(document.createTextNode(key));
		listItem.setAttribute("onclick", "reviewForm(this,event);");
		allForms.appendChild(listItem);
	}
}
function reviewForm(f, e){
	document.cookie="F_ID="+f.textContent;
	document.location.href = "PHQ9Diag.php";
	window.location.href = "PHQ9Diag.php";
}

function doNewPHQ9(){
	document.cookie="F_ID=";
	document.location.href = "PHQ9Diag.php";
	window.location.href = "PHQ9Diag.php";
}


//finds a unique ID
function uniqueid() {
    var ALPHABET = '023456789abcdefghijkmnopqrstuvwxyz';//no l, 1, or uppercases here
    var ID_LENGTH = 12;
    var rtn = '';
    for (var i = 0; i < ID_LENGTH; i++) {
      rtn += ALPHABET.charAt(Math.floor(Math.random() * ALPHABET.length));
    }
    return rtn;
}

function sideNavHeight(){
	var pat = document.getElementById('patientsContent');
	var nav = document.getElementById('sideNav');
	var patH = pat.clientHeight;
	var patTop = pat.getBoundingClientRect().top;
	var navTop = nav.getBoundingClientRect().top;
	var windowH = window.innerHeight;
	if(patTop>0){
		nav.style.height = patH.toString()+"px";
	}else{
		var newH = patH+patTop;
		nav.style.height = newH.toString()+"px";
	}
}