<?

$SERVER_CONFIG = 'local';

function CheckLocal() 
{
	global $SERVER_CONFIG;

	$whitelist = array('localhost', '127.0.0.1', 'localhost:8888');
	$betalist = array('beta.bitlet.co');
	if(in_array($_SERVER['HTTP_HOST'], $whitelist)){
		error_log('localhost');
		$SERVER_CONFIG = 'local';
	} else if(in_array($_SERVER['HTTP_HOST'], $betalist)){
		error_log('beta host');
		$SERVER_CONFIG = 'beta';
	} else {
		error_log('server host');
		$SERVER_CONFIG = 'server';
	}

	return $SERVER_CONFIG;
}

?>
