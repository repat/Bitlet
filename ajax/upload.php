<?
	// send results
	function SendResult($result)
	{
		echo '
		<script language="javascript" type="text/javascript">
			   window.top.window.UploadDone('.$result.');
		</script>';
		exit();
	}

	// only do something if it's an actual file upload
	if(isset($_FILES['file']))
	{
		$uploadroot = 'data/';
		$email = $_POST['email'];

		// check size
		if($_FILES['file']['size'] > 10000000) {	// limit is 10 MB
			error_log('File too large, maximum size is 10 MB');
			SendResult(0);
		}

		// check for errors
		if($_FILES['file']['error'] > 0) {
			error_log('File upload error, return code:'.$_FILES['file']['error']);
			SendResult(0);
		}

		$tmp_name = $_FILES['file']['tmp_name'];
		$name = $_FILES['file']['name'];

		$db = Connect();
		list($uid, $pass) = GetUID($email, 0);

		$uploaddir = $uploadroot.$uid;
		$uploadname = $uploaddir.'/'.$name;
		$sh = "mkdir $uploaddir";
		`$sh`;

		if(move_uploaded_file($tmp_name, $uploadname)) {
			$sh ="chmod 755 $uploadname";
			`$sh`;
		} else {
			error_log('File storage error');
			SendResult(0);
		}

		// insert file into db
		// file type: enum('generic','photo','music','digiart','document','video')
		$fid = NewFile($uid, $uploadname, 'generic');
		Disconnect($db);

		if($pass != null) {
			error_log('new user created, pass '.$pass);

			// email the user the pass on new account creation
			$to      = $email;
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
			$headers = 'From: team@bitlet.co'."\r\n" .
					'Reply-To: team@bitlet.co' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);
		}

		SendResult($fid);
	}
?>

