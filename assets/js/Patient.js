class Patient {
  constructor() {
    this.P_ID = "";
	this.fname = "";
	this.mname = "";
	this.lname = "";
	this.updated = "";
	this.ansPHQ9 = [];
  }
  getFullName(){
	  return this.fname + " " + this.mname + " " + this.lname;
  }
  addToDB(){
	  
  }
  deleteFromDB(){
	  
  }
  loadAnsFromDB(){
	  
  }
  addAnsToDB(){
	var id = uniqueid();
	var d = {"F_ID": id, "P_ID": this.P_ID, "numQ": this.ansPHQ9.length};
	for (var i = 0; i < this.ansPHQ9.length; i++) {
		d[i] = this.ansPHQ9[i];
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