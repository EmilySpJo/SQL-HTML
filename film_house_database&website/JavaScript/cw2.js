//function to validate form inputs
function validate(form) {
var ok=1
var msg=""
	for (var i = 0; i < form.length; i++) {
		if (form.elements[i].value.trim() == "") {
			msg += "'" + form.elements[i].name + "' is void. "
			ok=0 //if an input is invalid, this is set to 0 instead of 1
		}
	}
	/*if all inputs valid, the string to return will be empty, else an
	error message containing which inputs were invalid will be returned*/

	if (ok == 0) {
		alert(msg)
		return false
	}
	else {
		return true
	}

}
