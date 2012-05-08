<?

	$url = explode('/', $_SERVER['REQUEST_URI']);
	error_log('ajax url: '.$url[2]);

	switch($url[2]) {
		case 'upload':
			require('ajax/upload.php');
			break;
		case 'setprice':
			require('ajax/setprice.php');
			break;
		default:
			require('ajax/error.php');
			break;
	}

?>
