class Patient {
	constructor() {
	this.P_ID = "";
	this.fname = "";
	this.mname = "";
	this.lname = "";
	this.updated = "";
	//change to forms dictionary, using dict of form objects
	//form objects will obviously have to be made similar to this Patient class
	this.ansPHQ9 = {};
	this.attr = {};
	}
	getFullName(){
	  return this.fname + " " + this.mname + " " + this.lname;
	}
	addToDB(){
	  
	}
	deleteFromDB(){
	  
	}
	loadAnsFromDB(mode){
		
		var d = {"P_ID": this.P_ID};
		$.ajax({
			type: "POST",
			url: "includes/DB_Interface/findPatientForms.php",
			data: d,
			success: function(result){
				this.ansPHQ9 = JSON.parse(result);
				if(mode == 1){
					addPastForms(this);
				}
				else if(mode = 2){
					addStartValues(this);
				}
				//console.log(Object.keys(this.ansPHQ9).length);
			}
		});
		
	}
	addAnsToDB(array){
		var id = uniqueid();
		var d = {"F_ID": id, "P_ID": this.P_ID, "numQ": array.length};
		for (var i = 0; i < array.length; i++) {
			d[i] = array[i];
		}
		$.ajax({
			type: "POST",
			url: "includes/DB_Interface/addForm.php",
			data: d,
			success: function(result){
				if(result == 0){
					alert("0")
				}
				else if(result ==1){
					alert("1");
				}
				else{
					alert(result);
				}
			}
		});
	}

	toCookie(){
		return "P_ID="+this.P_ID;
	}
}
//phase out this is favor of list/dict const
Patient.prototype.manualConstructor = function (P_ID, fname, mname, lname) {
    this.P_ID = P_ID;
	this.fname = fname;
	this.mname = mname;
	this.lname = lname;
	//this.ansPHQ9 = this.ansPHQ9.concat(["more","stuff"]);
    return this;
};
Patient.prototype.dbFindConstructor = function (P_ID) {
	this.P_ID = P_ID;
	//read from DB
	
	return this;
};
Patient.prototype.listConstructor = function (list) {
	this.P_ID = list["P_ID"];
	this.fname = list["fname"];
	this.mname = list["mname"];
	this.lname = list["lname"];
	this.updated = list["fname"];
	return this;
};