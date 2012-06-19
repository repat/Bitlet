<?

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

?>
