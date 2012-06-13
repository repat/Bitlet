<?

function CheckLocal() 
{
	$whitelist = array('localhost', '127.0.0.1', 'localhost:8888');
	$betalist = array('afdadsfdasdfdd.com', 'beta.bitlet.co');
	if(in_array($_SERVER['HTTP_HOST'], $whitelist)){
		error_log('localhost');
		return 'local';
	} else if(in_array($_SERVER['HTTP_HOST'], $betalist)){
		error_log('beta host');
		return 'beta';
	} else {
		error_log('server host');
		return 'server';
	}
}

?>
