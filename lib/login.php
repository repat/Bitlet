<?

const COOKIE_NAME = 'BitletAuth';

function Autologin($uid) {
	// autogenerate a session hash
	$session = md5(rand());
	// autoexpire after 5 days
	setcookie(COOKIE_NAME, 'uid='.$uid.'&session='.$session, time()+60*60*24*5, '/');

	// save session in SQL database
	mysql_query("UPDATE users SET session='$session'
		WHERE id='$uid'") or die();
}

function Authenticate($email, $pass)
{
	$result = mysql_query("SELECT id, salt, password FROM users WHERE email = '$email'") or die();
	// check if correct result found
	if(mysql_num_rows($result) < 1) {
		error_log('No result found for email');
		return false;
	} else {
		$res = mysql_fetch_assoc($result);
		$hash_pass = $res['password'];
		$salt = $res['salt'];

		// hash password and check validity 
		if(sha1($pass.$salt) == $hash_pass) {
			return $res['id'];
		} else {
			error_log('Password incorrect');
			return false;
		}
	}
}

// check for valid email/pass, return true on successful authentication
function AuthenticateCookie($uid, $session)
{
	$result = mysql_query("SELECT session FROM users WHERE id = '$uid'") or die();
	// check if correct result found
	if(mysql_num_rows($result) < 1) {
		return false;
	} else {
		$res = mysql_fetch_assoc($result);
		$sql_session = $res['session'];

		// check validity 
		if($sql_session == $session) {
			return true;
		} else {
			return false;
		}
	}
}

?>
