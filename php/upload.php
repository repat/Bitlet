<?

	$uploadroot = '/static.simply.io/uploads/';
	$userid = '0';

	// check size
	if ($_FILES["file"]["size"] > 10000000) {	// limit is 10 MB
		$error = 'File too large, maximum size is 10 MB';
		exit();
	}

	// check for errors
	if ($_FILES["file"]["error"] > 0) {
		$error = 'File upload error, return code:'.$_FILES["file"]["error"];
		exit();
	}

	$uploaddir = $uploadroot.$userid.'/';
	`mkdir $uploaddir`;

	if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir)) {
		$sh ="chmod 755 $uploadfile";
		`$sh`;
	} else {
		$error = "File storage error";
		exit();
	}

	// if it gets to this point, the file is successfully uploaded and stored
	echo "Upload done. Running image script";

?>
