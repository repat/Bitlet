<?

// get all purchases by the user
function GetPurchases($uid)
{
	$result = mysql_query("SELECT fid FROM purchases WHERE uid='$uid' ORDER BY  `fid` ASC") 
		or die('cant get purchases');
	$rows = array();
	while($row = mysql_fetch_row($result)) {
		$rows[] = $row[0];
	}
	return $rows;
}

function GetPurchasesUIDs($fid)
{
	$result = mysql_query("SELECT id FROM purchases WHERE fid='$fid' ORDER BY  `id` ASC") 
		or die('cant get purchases');
	$rows = array();
	while($row = mysql_fetch_row($result)) {
		$rows[] = $row[0];
	}
	return $rows;
}	
	
// check if the input user purchased the file fid
// returns true if purchased, and false if not
function IfPurchased($uid, $fid)
{
	$result = mysql_query("SELECT * FROM purchases WHERE uid='$uid' and fid='$fid'") or die('can not find any purchases');
	if(mysql_num_rows($result) == 0) {	
		return false;	
	} else {
		return true;
	}
}

?>
