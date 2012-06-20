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
function EmailNewCreatedAccount($email, $pass, $name)
{
	
	$subject = 'Welcome to Bitlet!';
	$message = 
		'Hi '.$name.','."\r\n\r\n".
		'Welcome to Bitlet, the easiest way to sell your digital content.'."\r\n\r\n".
		'Your password is: '.$pass."\r\n\r\n".
		'Thanks for using Bitlet and let us know how we can help you be awesome (seriously.. anything)'."\r\n".
		'Team Bitlet'
		;
	EmailUser($email, $message, $subject);
}

// email the user their new password
function EmailPasswordReset($email, $pass, $name)
{
	$subject = 'New Bitlet.co Password!';
	$message = 
		'Dear '.$name.','."\r\n\r\n".
		'We have great news! Explorer Bitlet has just returned from his journey to find your long-lost password. He climbed to the peaks of the highest mountains, dove to the deepest depths of the oceans, and fought off several dragons, but he made it back. Success!'."\r\n\r\n". 
		'Your temporary password is: '.$pass."\r\n\r\n".
		'You can change your password after loging in to something else, and make sure to store your password safely. Luckily Explorer Bitlet is a hardy little fellow, so if you lose it again, he’ll be happy to go on another adventure to find it.'."\r\n\r\n".
		'Let me know if there’s anything else I can do to make your day better!'."\r\n\r\n".
		'Cheers,'."\r\n".
		'Lisa Bitlet'
		;
	EmailUser($email, $message, $subject);
}

function EmailItemPurchase($email, $productName)
{
	$subject = 'Thanks for buying '.$productName;
	$message = 
		'Dear Friend,'."\r\n\r\n".
		'Thank you for purchasing '.$productName."\r\n\r\n". 
		'To view a list of all of your purchases please go to <a href="http://bitlet.co/">Bitlet.co</a>.'."\r\n\r\n".
		'If you have any issues or need help please contact us at Lisa@bitlet.co '."\r\n\r\n".
		'Cheers,'."\r\n".
		'Lisa Bitlet'
		;
	EmailUser($email, $message, $subject);
}

function EmailItemPurchaseAndNewUser($email, $productName)
{
	$subject = 'Thanks for buying '.$productName;
	$message = 
		'Dear Friend,'."\r\n\r\n".
		'Thank you for purchasing '.$productName."\r\n\r\n". 
		'To view a list of all of your purchases please go to <a href="http://bitlet.co/">Bitlet.co</a>.'."\r\n\r\n".
		'If you have any issues or need help please contact us at Lisa@bitlet.co '."\r\n\r\n".
		'Cheers,'."\r\n".
		'Lisa Bitlet'
		;
	EmailUser($email, $message, $subject);
}

?>
