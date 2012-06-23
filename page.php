<?

function ViewPage($url, $args)
{
	// check for autologin cookie
	if(isset($_COOKIE[COOKIE_NAME]) && (!isset($_SESSION['uid']) || $_SESSION['uid'] == -1)) {
		parse_str($_COOKIE[COOKIE_NAME], $cookie);

		// authenticate cookie
		$uid = $cookie['uid'];
		$session = $cookie['session'];		

		if(AuthenticateCookie($uid, $session)) {
			$_SESSION['uid'] = $uid;
			error_log('session auto-authenticated into uid '.$uid);
		} else {
			$_SESSION['uid'] = -1;
			error_log('authentication cookie invalid');
		}
	}

	// we define a macro for shortness sake
	$UID = $_SESSION['uid'];
	error_log('args: '.$args[1]);

	switch($url) {
		case '':
			$dir = 'view/home';
			break;
		case 'dashboard':
			$dir = 'view/dashboard';
			break;
		case 'faq':
			$dir = 'view/faq';
			break;
		case 'claim':
			$dir = 'view/claim';
			break;
		case 'about':
			$dir = 'view/about';
			break;
		case 'settings':
			$dir = 'view/settings';
			break;
		case 'change-password':
			$dir = 'view/change-password';
			break;
		case 'payment-info':
			$dir = 'view/payment-info';
			break;
		case 'legal':
			$dir = 'view/legal';
			break;
		case 'legal':
			$dir = 'view/legal';
			break;
		case 'signup':
			$dir = 'view/create-account';
			break;
		case 'reset-details':
			$dir = 'view/reset-details';
			break;
		default:
			$dir = 'view/error';
			break;
	}

	// Build the HTML page
	echo '<!DOCTYPE html>';
	echo '<html>';

	echo '<head>';
		require_once('view/templates/header.php');
		IncludeCSSFiles('view/templates'); 
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
}

?>
