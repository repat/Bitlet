<?

// send results
function SendResult($result)
{
	echo '
	<script language="javascript" type="text/javascript">
		   window.top.window.ThumbUploadDone('.$result.');
	</script>';
	// kill the script on error result
	if($result <= 0) {
		die();
	}
}


$MAX_SIZE = 20000000;		// limit is 20 MB

// only do something if it's an actual file upload and if they're logged in
if(isset($_FILES['file']) && $UID >= 0)
{
	/*** RECEIVE FILE ***/
	$uploadroot = 'temp/';

	// check size
	if($_FILES['file']['size'] > $MAX_SIZE) {	
		error_log('File too large, maximum size is '.$MAX_SIZE);
		SendResult(0);
	}

	// check for errors
	if($_FILES['file']['error'] > 0) {
		error_log('File upload error, return code:'.$_FILES['file']['error']);
		SendResult(0);
	}

	$tmp_name = $_FILES['file']['tmp_name'];
	$name = $_FILES['file']['name'];

	$uploaddir = $uploadroot.$UID;
	$uploadname = $uploaddir.'/'.$name;
	$sh = 'mkdir "'.$uploaddir.'"';
	`$sh`;

	if(move_uploaded_file($tmp_name, $uploadname)) {
		$sh ='chmod 777 "'.$uploadname.'"';
		`$sh`;
	} else {
		error_log('File storage error');
		SendResult(0);
	}

	// make sure the file is an actual image file
	if(CatagorizeFile($name) != 'photo') {
		error_log('wrong file type!');
		SendResult(0);
	}

	$fid = $_POST['fid'];

	// process the image into thumbnail size and set
	$thumb = GenerateImageThumbnail($fid, $uploadname);
	SetThumbnail($fid, $thumb);
}
else
{
	// no file detected, why are we here again??
	error_log('no file detected in upload ajax call');
	SendResult(0);
}

?>
