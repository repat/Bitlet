<!DOCTYPE html>
<?
	include_once 'lib/dir.php';

    session_start();
    #$_SESSION['user_id'] = 1234;
	$url = explode('/', $_SERVER['REQUEST_URI']);
	error_log('url: '.$url[1]);

	if(!isset($_GET['request'])) {

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
			case 'sell':
				$dir = 'view/sell';
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

		IncludeJSFiles($dir); 
        require_once('view/templates/footer.php');

		echo '</html>';

    } else {
        switch($url[1]) {
            case 'upload':
                require('upload.php');
                break;
        }
    }

?>
