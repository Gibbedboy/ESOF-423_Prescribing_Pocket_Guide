function loadPatients(){
	loadOne("Joe", "??", "Today");
	loadOne("Bob", "???", "Now");
	loadOne("This", "will be", "Modifiable");
	loadOne("Read", "from a", "Database");
	for (let i = 0; i < 20; i++) {
		loadOne(i.toString(),i.toString(),i.toString());
	}
}

function loadOne(inName, inX, inDate){
	var wholeList = document.getElementById("allPatients");
	var patient = document.createElement("li");
	var name = document.createElement("li");
	var x = document.createElement("li");
	var date = document.createElement("li");
	var pList = document.createElement("ul");
	
	name.appendChild(document.createTextNode(inName));
	x.appendChild(document.createTextNode(inX));
	date.appendChild(document.createTextNode(inDate));
	pList.appendChild(name);
	pList.appendChild(x);
	pList.appendChild(date);
	
	patient.appendChild(pList);
	patient.id= "person";
	wholeList.appendChild(patient);
}

function addNew(){
	var fName = document.getElementById("fName");
	var mName = document.getElementById("mName");
	var lName = document.getElementById("lName");
	var x = document.getElementById("x");
	if(fName.value && mName.value && lName.value && x.value){
		var name = fName.value + " " + mName.value + " " + lName.value;
		loadOne(name, x.value, "Now");
		
		fName.value = "";
		mName.value = "";
		lName.value = "";
		x.value = "";
		var modal = document.getElementById('myModal');
		modal.style.display = "none";
	}else{
		alert("Please fill out all information fields");
	}
}
function sideNavHeight(){
	var pat = document.getElementById('patientsContent');
	var nav = document.getElementById('sideNav');
	var patH = pat.clientHeight;
	var patTop = pat.getBoundingClientRect().top;
	var top = nav.getBoundingClientRect().top;
	var newH =  (patH+patTop)+top;
	nav.style.height = newH.toString()+"px";
}