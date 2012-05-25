<?
	// check for valid email/pass, return true on successful authentication
	// add a new file under input user uid
	// file type: enum('generic','photo','music','digiart','document','video')
	function NewFile($uid, $filename, $type)
	{
		$filename = mysql_real_escape_string($filename);
		// Insert file into files table
		mysql_query("INSERT INTO file (uid, file_name, type)
			VALUES('$uid', '$filename', '$type')") or die();
		return mysql_insert_id();
	}

	// set price for a file
	function SetPrice($fid, $price)
	{
		$price = mysql_real_escape_string($price);
		//TODO: Error check the price
		mysql_query("UPDATE file SET price='$price'
			WHERE id='$fid'") or die();
	}

	// set price for a file
	function SetDisplayName($fid, $name)
	{
		$name = mysql_real_escape_string($name);
		mysql_query("UPDATE file SET name='$name'
			WHERE id='$fid'") or die();
	}

	// set price for a file
	function SetURL($fid, $url)
	{
		$url = mysql_real_escape_string($url);
		mysql_query("UPDATE file SET url='$url'
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

	// returns fid from input url
	function GetFidFromUrl($url)
	{
		$url = mysql_real_escape_string($url);
		$result = mysql_query("SELECT id FROM file WHERE url='$url'") or die();
		return mysql_result($result, 0);
	}

	function GetFileFromId($fid)
	{
		//Query the user database and see if the user already has an account
		$result = mysql_query("SELECT name FROM file WHERE id = '$fid'") or die();
		if(mysql_num_rows($result) == 0) {
			die('File does not exist');
		}
		return mysql_result($result, 0);
	}

?>
