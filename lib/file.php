<?

// check for valid email/pass, return true on successful authentication
// add a new file under input user uid
// file type: enum('generic','photo','music','digiart','document','video')
function NewFile($uid, $filename, $type='generic', $fsize=0)
{
	$filename = mysql_real_escape_string($filename);
	// generate a display name from filename
	$name = implode(explode('.', $filename, -1));
	$name = str_replace('_', ' ', $name);	// replace underscores with spaces to look better

	// Insert file into files table
	mysql_query("INSERT INTO files (uid, name, file_name, type, size)
		VALUES('$uid', '$name', '$filename', '$type', '$fsize')") or die();
	return mysql_insert_id();
}

// set the thumbnail path for a file
function SetThumbnail($fid, $thumb)
{
	$thumb = mysql_real_escape_string($thumb);
	mysql_query("UPDATE files SET thumb_url='$thumb'
		WHERE id='$fid'") or die();
}

// delete the file with the given fid
function DeleteFile($fid)
{
	mysql_query("DELETE FROM files
		WHERE id='$fid'") or die('error deleting file');
}

// set price for a file
function SetPrice($fid, $price)
{
	$price = mysql_real_escape_string($price);
	//TODO: Error check the price
	mysql_query("UPDATE files SET price='$price'
		WHERE id='$fid'") or die();
}

// update file settings, will only update the settings specified
// we want the name, price, description, type, and param
function SetFileDetails($fid, $opt)
{
	// build the query
	$query = 'UPDATE files SET ';
	foreach(array('name', 'price', 'description', 'type', 'param') as $p) {
		if(isset($opt[$p])) {
			$query .= $p.'="'.mysql_real_escape_string($opt[$p]).'",';
		}
	}
	// trim last uncessary comma
	$query = substr($query, 0, -1);
	$query .= ' WHERE id="'.$fid.'"';

	// run the actual query	
	mysql_query($query) or die('error updating file details');
	//error_log('Updated file details, query: '.$query);
}

// returns an array of fid from user
function GetFids($uid)
{
	$result = mysql_query("SELECT id FROM files WHERE uid='$uid' ORDER BY  `id` ASC") or die('cant get fids');
	$rows = array();
	while($row = mysql_fetch_row($result)) {
		$rows[] = $row[0];
	}
	return $rows;
}

// returns info about the file
function GetFileInfo($fid)
{
	$result = mysql_query("SELECT * FROM files WHERE id='$fid'") or die();
	return mysql_fetch_assoc($result);
}

// get the filename of specifided file
function GetFileFromId($fid)
{
	//Query the user database and see if the user already has an account
	$result = mysql_query("SELECT file_name FROM files WHERE id = '$fid'") or die();
	if(mysql_num_rows($result) == 0) {
		return false;
	}
	return mysql_result($result, 0);
}
// get the price of the file
function GetFilePrice($fid)
{
	$result = mysql_query("SELECT price FROM files WHERE id='$fid'") or die('cannot get price');	
	if(mysql_num_rows($result) == 0) {
		return false;
	}
	return mysql_result($result, 0);
}

// returns fid from input custom url
function GetFidFromUrl($url)
{
	$url = mysql_real_escape_string($url);
	$result = mysql_query("SELECT id FROM files WHERE url='$url'") or die();
	return mysql_result($result, 0);
}

// file link conversion functions
function GetFidFromLink($link)
{
	return base_convert($link, 36, 10);
}

function GetLinkFromFid($fid)
{
	return base_convert($fid, 10, 36);
}

// catagorize files into:
// photo, digiart, video, document, music, and generic;w
function CatagorizeFile($ftype)
{
	switch($ftype) {
	case 'png':
	case 'jpg':
	case 'gif':
	case 'tif':
	case 'tiff':
		return 'photo';
	case 'psd':
		return 'digiart';
	case 'mov':
	case 'avi':
	case 'wmv':
	case 'mkv':
		return 'video';
	case 'pdf':
	case 'doc':
	case 'docx':
	case 'rtf':
	case 'txt':
		return 'document';
	case 'wma':
	case 'mp3':
		return 'music';
	default:
		return 'generic';
	}
}

?>
