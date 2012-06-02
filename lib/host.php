<?

function CheckLocal() 
{
	$whitelist = array('localhost', '127.0.0.1', 'localhost:8888');
	if(!in_array($_SERVER['HTTP_HOST'], $whitelist)){
		error_log('remote server host');
		return false;
	} else {
		error_log('localhost');
		return true;
	}
}

?>
