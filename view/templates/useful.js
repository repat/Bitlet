
function EmailValid(email) {
	// emails should be at least 5 characters, and contain a '@' and a '.'
	var aix = email.indexOf('@');
	var dix = email.lastIndexOf('.');
	return (email.length > 4 && aix != -1 && dix != -1 && aix < dix);
};

