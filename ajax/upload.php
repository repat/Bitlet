<?

// send results
function SendResult($result)
{
	echo '
	<script language="javascript" type="text/javascript">
		   window.top.window.UploadDone('.$result.');
	</script>';
	// kill the script on error result
	if($result <= 0) {
		die();
	}
}

$MAX_SIZE = 5000000000;		// limit is 5 GB

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

	// figure out filetype
	$ftype = CatagorizeFile($name);

	// get file size
	$fsize = filesize($uploadname);

	// insert file into db
	// file type: enum('generic','photo','music','digiart','document','video')
	$fid = NewFile($UID, basename($uploadname), $ftype, $fsize);

	// generate thumbnails TODO
	$thumb = '';
	switch($ftype) {
	case 'photo':
	case 'digiart':
		$thumb = GenerateImageThumbnail($fid, $uploadname);
		break;
	case 'video':
		break;
	case 'document':
		break;
	case 'music':
		break;
	case 'generic':
		break;
	}

	// check thumb
	if($thumb === false) {
		SendResult(0);
	}

	// set thumb in database
	SetThumbnail($fid, $thumb);

	/*** AJAX BACK TO USER ***/
	SendResult($fid);

	/*** UPLOAD TO AWS ***/
	if(!AwsUpload($fid, $uploadname)) {
		// TODO: we should do something here..
		die('Cannot upload to AWS');
	}

	// once uploaded, delete the local copy
	$sh = 'rm "'.$uploadname.'"';
	`$sh`;

	error_log('file created, fid: '.$fid.', size: '.$fsize);
} else {
	// no file detected, why are we here again??
	error_log('no file detected in upload ajax call');
	SendResult(0);
}

?>
