<?
	include 'db_settings.php';
	$cookie_name = 'BitletAuth';

	function Autologin($uid) {
		// autogenerate a session hash
		$session = md5(rand());
		// autoexpire after 5 days
		setcookie($cookie_name, 'uid='.$uid.'&session='.$session, time()+60*60*24*5, '/');

		// save session in SQL database
		mysql_query("UPDATE user SET session='$session'
			WHERE id='$uid'") or die();
	}

	function Authenticate($email, $pass)
	{
		$result = mysql_query("SELECT salt, password FROM user WHERE email = '$email'") or die();
		// check if correct result found
		if(mysql_num_rows($result) < 2) {
			return false;
		} else {
			$res = mysql_fetch_assoc($result);
			$hash_pass = $res['password'];
			$salt = $res['salt'];

			// hash password and check validity 
			if(sha1($pass.$salt) == $hash_pass) {
				return true;
			} else {
				return false;
			}
		}
	}

	// check for valid email/pass, return true on successful authentication
	function AuthenticateCookie($uid, $session)
	{
		$result = mysql_query("SELECT session FROM user WHERE id = '$uid'") or die();
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
