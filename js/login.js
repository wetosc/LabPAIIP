$(document).ready(function() { 
	// setCustomValidity("Invalid field.")
	
	$("#email").on("focusout", function(){

	} )


	var passwordField = $("#passwordField").first()

	passwordField.on("focusout", function(){
		if (passwordField.val().length < 6){
			passwordField[0].setCustomValidity("Password too short.")
		}
		else {
			passwordField[0].setCustomValidity("")
		}
	} )
});
