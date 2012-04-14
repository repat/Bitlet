<?

	$uploadroot = '../uploads/';
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

	$tmp_name = $_FILES["file"]["tmp_name"];
	$name = $_FILES["file"]["name"];

	$uploadname = $uploadroot.$userid.'/'.$name;
	$sh = "mkdir $uploaddir";
	`$sh`;


	if (move_uploaded_file($tmp_name, $uploadname)) {
		$sh ="chmod 755 $uploadname";
		`$sh`;
	} else {
		$error = "File storage error";
		exit();
	}

	// if it gets to this point, the file is successfully uploaded and stored
	echo "Upload done. Running image script";

?>
