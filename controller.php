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
		case 'admin':
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
		case 'buy':
			$dir = 'view/buy';
			break;
		case 'file':
			$dir = 'view/file';
			break;
		default:
			$dir = 'view/error';
			break;
	}

	// Build the HTML page
	echo '<html>';

	require_once('view/templates/header.php');
	IncludeCSSFiles($dir); 

	require_once('view/templates/nav.php');
	require_once($dir.'/index.php');

	require_once('view/templates/footer.php');
	IncludeJSFiles('view/templates'); 
	IncludeJSFiles($dir); 

	echo '</html>';

?>

