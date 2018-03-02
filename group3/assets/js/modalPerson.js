function modalPerson(){
	// Get the modal
	var modal = document.getElementById('myModal');
	modal.getElementsByTagName("h1")[0].textContent = "New Patient";
	// Get the button that opens the modal
	var btn = document.getElementById("addPatient");
	var allForms = document.getElementsByClassName("dropdown")[0];

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
		modal.getElementsByTagName("h1")[0].textContent = "New Patient";
		var fName = document.getElementById("fName");
		var mName = document.getElementById("mName");
		var lName = document.getElementById("lName");
		var x = document.getElementById("x");
		var submitBtn = document.getElementById("modalSubmit");
		submitBtn.value = "Submit"
		var PHQ9btn = document.getElementById("modalPHQ9");
		fName.value = "";
		mName.value = "";
		lName.value = "";
		x.value = "";
		PHQ9btn.style.display = "none";
		allForms.style.display = "none";
	
		modal.style.display = "block";
	}
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
		
		if (!event.target.matches('.dropbtn')) {
			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				}
			}
		}
	}
}

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function toggleDropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
}