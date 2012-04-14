<?

	$uploaddir = '/static.simply.io/uploads';

	// check size
	if ($_FILES["file"]["size"] > 10000000) {	// limit is 10 MB
		$error = 'File too large, maximum size is 10 MB';
		exit();
	}

	// check for errors
	if ($_FILES["file"]["error"] > 0)
	{
		$error = 'File upload error, return code:'.$_FILES["file"]["error"];
		exit();
	}

	// if it gets to this point, the file is successfully uploaded and stored
	echo "Upload done. Running image script";

?>
