<?
	include_once 'db.php';  //load the DB Settings.

	// get the uid of user based on his email, also links up facebook id
	function GetUID($email, $fbid)
	{
		// default password return as null if user already exist
		$pass = null;

		$email = mysql_real_escape_string($email);
		$fbid = mysql_real_escape_string($fbid);

		//Query the user database and see if the user already has an account
		$result = mysql_query("SELECT id FROM user WHERE email = '$email'") 
			or die('Cannot execute find email '.$email);
		if(mysql_num_rows($result) == 0) {
			//create new user
			$salt = substr(md5(rand()), 0, 8); 
			$pass = substr(md5(rand()), 0, 8); 
			$hashed_pass = sha1($pass.$salt);
			mysql_query("INSERT INTO user (email, name, fbid, password, salt, credits)
				VALUES ('$email', '$email', '$fbid', '$hashed_pass', '$salt', '0')") 
				or die('Cannot make new user with email '.$email);
			return array(mysql_insert_id(), $pass);
		}
		return array(mysql_result($result, 0), $pass);
	}

	// set the user display name
	function SetUserName($uid, $name)
	{
		$name = mysql_real_escape_string($name);
		mysql_query("UPDATE user SET name='$name'
			WHERE id='$uid'") or die('Cannot set username, uid='.$uid);
	}

	// get user display name
	function GetUserName($uid)
	{
		$result = mysql_query("SELECT name FROM user WHERE id='$uid'") 
			or die('Cannot get user name, uid='.$uid);
		return mysql_result($result, 0);
	}

	// set the user password - used to change password
	function SetUserPassword($uid, $pass)
	{
		$salt = substr(md5(rand()), 0, 8); 
		$hashed_pass = sha1($pass.$salt);
		mysql_query("UPDATE user SET password='$hashed_pass'
			WHERE id='$uid'") or die('Cannot set password, uid='.$uid);
	}

	// get user email
	function GetUserEmail($uid)
	{
		$result = mysql_query("SELECT email FROM user WHERE id='$uid'") 
			or die('Cannot get email, uid='.$uid);
		return mysql_result($result, 0);
	}

	// get all the user info
	function GetUserInfo($uid)
	{
		$result = mysql_query("SELECT * FROM user WHERE id='$uid'") 
			or die('Cannot get user info, uid='.$uid);
		return mysql_fetch_assoc($result);
	}

	// show how much money a user has left
	function GetCredits($uid)
	{
		$result = mysql_query("SELECT credits FROM user WHERE id='$uid'") 
			or die('Cannot get user credits, uid='.$uid);
		return mysql_result($result, 0);
	}

?>
