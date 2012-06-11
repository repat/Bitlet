<?

function ViewBuy($url, $args)
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
	$dir = 'view/buy';

	// Build the HTML page
	echo '<!DOCTYPE html>';
	echo '<html>';

	echo '<head>';
		require_once('view/templates/header.php');
		IncludeCSSFiles('view/templates'); 
		IncludeCSSFiles($dir); 
	echo '</head>';

	echo '<body>';
		require_once($dir.'/index.php');
		require_once('view/templates/footer.php');
		IncludeJSFiles('view/templates'); 
		IncludeJSFiles($dir); 
	echo '</body>';

	echo '</html>';
}

?>
