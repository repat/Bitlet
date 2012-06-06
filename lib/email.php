<?

function EmailUser($email, $msg)
{
	$subject = 'Welcome to Bitlet!';
	$headers = 'From: team@bitlet.co'."\r\n" .
			'Reply-To: team@bitlet.co' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
	mail($email, $subject, $msg, $headers);
}

// email the user the pass on new account creation
function EmailNewUser($email, $pass)
{
	$message = 
		'Hi friend!'."\r\n\r\n".
		'Welcome to Bitlet, the easiest way to sell your digital content.'."\r\n\r\n".
		'We\'ve created a new account for you so you can keep track of your files.'."\r\n".
		'Your temporary password is: '.$pass."\r\n\r\n".
		'Just use your email and temporary password to login for the first time, and feel free to change the password in your account settings.'."\r\n\r\n".
		'Thanks for using us!'."\r\n".
		'Team Bitlet'
		;
	EmailUser($email, $message);
}

?>
