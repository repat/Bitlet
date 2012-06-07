<?

function EmailUser($email, $msg, $subject, $name = "Customer")
{
	if($name == "Customer") { 
		$headers = 'From: Lisa Bitlet <lisa@bitlet.co>'."\r\n" .
			'Reply-To: Lisa Bitlet <lisa@bitlet.co>' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		mail($email, $subject, $msg, $headers); 
	} else {
		$headers = 'From: Bitlet Thinks'.$name.' is awesome <lisa@bitlet.co>'."\r\n" .
			'Reply-To: Lisa Bitlet <lisa@bitlet.co>' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		$concatNameEmail = $name.'<'.$email.'>';
		mail($concatNameEmail, $subject, $msg, $headers);
	}
}
// email the user the pass on new account creation
function EmailNewUser($email, $pass)
{
	
	$subject = 'Welcome to Bitlet!';
	$message = 
		'Hi friend!'."\r\n\r\n".
		'Welcome to Bitlet, the easiest way to sell your digital content.'."\r\n\r\n".
		'We\'ve created a new account for you so you can keep track of your files.'."\r\n".
		'Your temporary password is: '.$pass."\r\n\r\n".
		'Just use your email and temporary password to login for the first time, and feel free to change the password in your account settings.'."\r\n\r\n".
		'Thanks for using us!'."\r\n".
		'Team Bitlet'
		;
	EmailUser($email, $message, $subject);
}

// email the user their new password
function EmailPasswordReset($email, $pass, $name)
{
	$subject = 'New Bitlet.co Password!';
	$message = 
		'Hi '.$name.','."\r\n\r\n".
		'Your temporary password is: '.$pass."\r\n\r\n".
		'Please use your email and temporary password to login and be sure to reset your password.'."\r\n\r\n".
		'Next time try not forget your password! We have to send Explorer Bitlet out to find you a new one everytime!'."\r\n\r\n".
		'Happy hunting,'."\r\n".
		'Team Bitlet'
		;
	EmailUser($email, $message, $subject);
}

?>
