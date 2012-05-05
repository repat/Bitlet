<?

	$url = explode('/', $_SERVER['REQUEST_URI']);
	switch($url[2]) {
		case 'upload':
			require('ajax/upload.php');
			break;
		default:
			require('ajax/error.php');
			break;
	}

?>
