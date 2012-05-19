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
		// get root path
		$path = $_SERVER['DOCUMENT_ROOT'];

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

		// setup database
		include $path.'/lib/user.php';
		include $path.'/lib/file.php';
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
			// TODO: email the user the pass
		}

		SendResult($fid);
	}
?>

