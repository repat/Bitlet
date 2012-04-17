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
	function NewFile($uid, $filename, $type)
	{
		// Insert file into files table
		mysql_query("INSERT INTO file (uid, name, tyle)
			VALUES('$uid', '$filename', '$type')") or die();
		return mysql_insert_id();

	}

	// set price for a file
	function SetPrice($fid, $price)
	{
		mysql_query("UPDATE file SET price='$price'
			WHERE id='$fid'") or die();
	}

	// set price for a file
	function SetDisplayName($fid, $name)
	{
		mysql_query("UPDATE file SET dname='$name'
			WHERE id='$fid'") or die();
	}

	// set price for a file
	function SetURL($fid, $url)
	{
		mysql_query("UPDATE file SET price='$url'
			WHERE id='$fid'") or die();
	}

	// increment number sold and also add to the user's credits
	function IncrementDownloads($fid)
	{
		// update downloads list
		mysql_query("UPDATE file SET downloads = downloads + 1 WHERE id='$fid'") or die();
		// get price
		$result = mysql_query("SELECT price, uid FROM file WHERE id='$fid'") or die();
		$row = mysql_fetch_row($result);
		$price = $row[0];
		$uid = $row[1];
		// add price to user id credits
		mysql_query("UPDATE user SET credits = credits + '$price' WHERE id='$uid'") or die();
	}

	// show how much money a user has left
	function GetCredits($uid)
	{
		$result = mysql_query("SELECT credits FROM user WHERE id='$uid'") or die();
		return mysql_result($result, 0);
	}

	// get user from 
	function GetUserInfo($uid)
	{
		$result = mysql_query("SELECT * FROM user WHERE id='$uid'") or die();
		return mysql_fetch_assoc($result);
	}

	// returns an array of fid from user
	function GetFids($uid)
	{
		$result = mysql_query("SELECT id FROM file WHERE uid='$uid'") or die('cant get fids');
		$rows = array();
		while($row = mysql_fetch_row($result)) {
			$rows[] = $row[0];
		}
		return $rows;
	}

	// returns info about the file
	function GetFileInfo($fid)
	{
		$result = mysql_query("SELECT * FROM file WHERE id='$fid'") or die();
		return mysql_fetch_assoc($result);
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

