<?

// increment number sold and also add to the user's credits
function IncrementDownloads($fid)
{
	// get price
	$result = mysql_query("SELECT price, uid FROM files WHERE id='$fid'") or die();
	$row = mysql_fetch_row($result);
	$price = $row[0];
	$uid = $row[1];

	// add price to user id credits
	mysql_query("UPDATE users SET credits = credits + '$price' WHERE id='$uid'") or die();
	// update downloads list and increment money made
	mysql_query("UPDATE files SET downloads = downloads + 1, earned = earned + '$price' WHERE id='$fid'") or die();
}

function IncrementViews($fid)
{
	// update views
	mysql_query("UPDATE files SET views = views + 1 WHERE id='$fid'") or die();
}

function PurchaseFile($email, $fid)
{
	// get the price of the file
	
	// get the user id
	$uid = CheckUserEmail($email);
	if($uid === false) {
		// TODO: no uid exists, make a new user
	}
	mysql_query("INSERT INTO purchases (fid, uid, amount_paid)
		VALUES('$fid', '$uid', '$amount_paid')") or die('cannot add new purchases');
}

?>
