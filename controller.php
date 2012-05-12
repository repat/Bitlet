<!DOCTYPE html>
<?
	include_once 'lib/dir.php';

    session_start();
    #$_SESSION['user_id'] = 1234;
	
	$url = explode('/', $_SERVER['REQUEST_URI']);
	$args = $_GET['args'];
	error_log('url: '.$url[1]);
	error_log('args: '.$args);

	switch($url[1]) {
		case '':
			$dir = 'view/home';
			break;
		case 'a':
			$dir = 'view/admin';
			break;
		case 'faq':
			$dir = 'view/faq';
			break;
		case 'terms':
			$dir = 'view/terms';
			break;
		case 'about':
			$dir = 'view/about';
			break;
		case 'b':
			$dir = 'view/buy';
			break;
		case 'l':
			$dir = 'view/link';
			break;
		default:
			$dir = 'view/error';
			break;
	}

	// Build the HTML page
	echo '<html>';

	echo '<head>';
		require_once('view/templates/header.php');
		IncludeCSSFiles($dir); 
	echo '</head>';

	echo '<body>';
		require_once('view/templates/nav.php');
		require_once($dir.'/index.php');
		require_once('view/templates/footer.php');
		IncludeJSFiles('view/templates'); 
		IncludeJSFiles($dir); 
	echo '</body>';

	echo '</html>';

?>

