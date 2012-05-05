<?
	// get root path
	$path = $_SERVER['DOCUMENT_ROOT'];

	$uploadroot = 'data/';
	$email = $_POST['email'];

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

	// setup database
	include $path.'/lib/db.php';
	$db = Connect();
	$uid = GetUID($email, 0);

	$uploaddir = $uploadroot.$uid;
	$uploadname = $uploaddir.'/'.$name;
	$sh = "mkdir $uploaddir";
	`$sh`;

	if (move_uploaded_file($tmp_name, $uploadname)) {
		$sh ="chmod 755 $uploadname";
		`$sh`;
	} else {
		$error = "File storage error";
		exit();
	}

	// insert file into db
	$fid = NewFile($uid, $uploadname);
	Disconnect($db);

	echo "DONE!";
?>

