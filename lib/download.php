<? 

	$path = $_SERVER['DOCUMENT_ROOT'];
	include $path.'/lib/db.php';

	$fid = $_POST['fid'];

	$db = Connect();
	$name = GetFileFromId($fid);
	IncrementDownloads($fid);
	Disconnect($db);

	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($name));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($name));
	ob_clean();
	flush();
	readfile($name);
	exit;

?>
