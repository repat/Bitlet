<?
	include_once 'page.php';
	include_once 'async.php';

	// include lib files
	foreach (glob("lib/*.php") as $filename) {
		include_once $filename;
	}

    session_start();

	$db = Connect();

	$url = explode('/', $_SERVER['REQUEST_URI']);
	$args = array_slice($url, 1);
	error_log('url: '.$url[1]);

	// see if request is for iframe, ajax, or just normal page
	switch($url[1])
	{
	case 'ajax':
		ViewAjax($url[2], $args);
		break;
	default:
		ViewPage($url[1], $args);
		break;
	}

	// disconnect from database after all is done
	Disconnect($db);
?>
