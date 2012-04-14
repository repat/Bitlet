<?php

	include 'db_settings.php';  //load the DB Settings.

	function GetUID($email, $fbid)
	{
		//Query the user database and see if the user already has an account
		$result = mysql_query("SELECT id FROM user WHERE email = '$email'") or die();
		if (mysql_num_rows($result) == 0) {
			//create new user
			mysql_query("INSERT INTO user (email, fbid, credits)
				VALUES ('$email', '$fbid', '0')") or die();;
			$result = mysql_query("SELECT id FROM user WHERE email = '$email'") or die();
		}
		return mysql_result($result, 0);
	}

	function NewFile($uid, $filename)
	{
		// Insert file into files table
		mysql_query("INSERT INTO file (uid, name)
			VALUES('$uid', '$filename')") or die();
	}

?>
