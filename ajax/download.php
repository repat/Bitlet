<? 
	$fid = $_POST['fid'];

	$name = GetFileFromId($fid);
	list($url, $size) = AwsGetUrl($fid);

	error_log('AWS URL: '.$url.' size: '.$size);
	IncrementDownloads($fid);
	
	header('Location: '.$url);	
?>
