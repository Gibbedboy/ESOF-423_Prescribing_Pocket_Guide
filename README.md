# ESOF-423_Prescribing_Pocket_Guide
For the MSU Software Engineering class

Useful links for the coding standards the client wants (I think)
http://fhir.cerner.com/millennium/dstu2/
https://docs.healtheintent.com/#introduction

v1.0 - Beta Release
Instructions, directions and features:
	Login uses users stored on database
		default is 'admin', 'admin'
		new users can be added with 'Signup' link
	PHQ9 questionnaire working independently
	add patient functionality working
	delete patient functionality working via delete icon
	edit patient window working, actual editing is not available
	patient specific PHQ9 Forms can be filled out and reviewed
	patients added permanently via database
		patients contain fname, lname, mname, updated, 
		email, and phone variables

Known Bugs:
	Failed to delete message appears when deleting patient
		Due to related forms not being deleted too
	Patients page side nav bar height varies at times
	Sometimes multiple clicks are needed to trigger edit patient popup
	Diagnosis message width sometimes goes past the body
