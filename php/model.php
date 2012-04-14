<?php

	include 'db_settings.php';  //load the DB Settings.

	// get the uid of user based on his email, also links up facebook id
	function GetUID($email, $fbid)
	{
		//Query the user database and see if the user already has an account
		$result = mysql_query("SELECT id FROM user WHERE email = '$email'") or die();
		if (mysql_num_rows($result) == 0) {
			//create new user
			mysql_query("INSERT INTO user (email, fbid, credits)
				VALUES ('$email', '$fbid', '0')") or die();;
			return mysql_insert_id();
		}
		return mysql_result($result, 0);
	}

	// add a new file under input user uid
	function NewFile($uid, $filename)
	{
		// Insert file into files table
		mysql_query("INSERT INTO file (uid, name)
			VALUES('$uid', '$filename')") or die();
		return mysql_insert_id();

	}

	// set price for a file
	function SetPrice($fid, $price)
	{
		mysql_query("UPDATE file SET price='$price'
			WHERE id='$fid'") or die();
	}

	// increment number sold and also add to the user's credits
	function IncrementDownloads($fid)
	{
		// update downloads list
		mysql_query("UPDATE file SET downloads = downloads + 1 WHERE id='$fid'") or die();
		// get price
		$result = mysql_query("SELECT price, uid FROM file WHERE id='$fid'") or die();
		$price = mysql_result($result, 0);
		$uid = mysql_result($result, 1);
		// add price to user id credits
		mysql_query("UPDATE user SET credits = credits + '$price' WHERE id='$uid'") or die();
	}

	// show how much money a user has left
	function GetCredits($uid)
	{
		$result = mysql_query("SELECT credits FROM user WHERE id='$uid'") or die();
		return mysql_result($result, 0);
	}

	function GetFileFromId($fid)
	{
		//Query the user database and see if the user already has an account
		$result = mysql_query("SELECT name FROM file WHERE id = '$fid'") or die();
		if (mysql_num_rows($result) == 0) {
			die('File does not exist');
		}
		return mysql_result($result, 0);
	}

?>
