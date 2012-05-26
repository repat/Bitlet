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
			} else {
				$_SESSION['uid'] = -1;
			}
		} else if(!isset($_SESSION['uid'])) {
			error_log('new user, default session uid');
			$_SESSION['uid'] = -1;	// start with a uid of -1 when not logged in 
		}

		switch($url) {
			case '':
				$dir = 'view/home';
				break;
			case 'admin':
				$dir = 'view/admin';
				break;
			case 'help':
				$dir = 'view/help';
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
			case 'legal':
				$dir = 'view/legal';
				break;
			case 'reset':
				$dir = 'view/reset-password';
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
