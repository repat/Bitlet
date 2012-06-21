<? 
	$fid = $_POST['fid'];

	//TODO: add security layer to make sure the user actually have the file

	$name = GetFileFromId($fid);
	list($url, $size) = AwsGetUrl($fid);
	IncrementDownloads($fid);
	
	header('Location: '.$url);	
?>
