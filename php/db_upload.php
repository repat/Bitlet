<?php

	include 'db_settings.php';  //load the DB Settings.

	function GetUID($db, $email, $fbid)
	{
		//Query the user database and see if the user already has an account
		$uid = mysql_query("SELECT id FROM user WHERE email = '$email'", $db);
		if (!$uid) {
			//create new user
			mysql_query("INSERT INTO user (email, fbid, credits)
				VALUES ('$email', '$fbid', '0')", $db);
			$uid = mysql_query("SELECT id FROM user WHERE email = '$email'", $db);
		}
		return $uid;
	}

	function NewFile($db, $uid, $filename)
	{
		// Insert file into files table
		mysql_query("INSERT INTO file (uid, name)
			VALUES('$uid', '$filename')", $db);
	}

?>
