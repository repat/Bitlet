<? 
	$fid = $_POST['fid'];

	$name = GetFileFromId($fid);
	list($url, $size) = AwsGetUrl($fid);

	error_log('AWS URL: '.$url.' size: '.$size);
	IncrementDownloads($fid);

	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($name));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: '.$size);
	ob_clean();
	flush();
	readfile($url);
	exit;
?>
