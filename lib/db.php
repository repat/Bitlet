<?

include 'host.php';

function Connect()
{
	switch (CheckLocal())
	{
	case 'local':
		$db_host = 'localhost';
		$db_dbname = 'bitlet';
		$db_username ='root';
		$db_password ='root';
		break;
	case 'beta':
		$db_host='internal-db.s150773.gridserver.com';
		$db_dbname = 'db150773_betabitlet';
		$db_username = 'db150773';
		$db_password = 'zhang1243';
		break;
	case 'server':
		$db_host = 'internal-db.s150773.gridserver.com';
		$db_dbname = 'db150773_bitlet_production';
		$db_username ='db150773';
		$db_password ='zhang1243';
		break;
	}

	$db_con = mysql_connect($db_host, $db_username, $db_password) 
		or die('Could not connect: ' . mysql_error());//connect to the database server
	mysql_select_db($db_dbname, $db_con) or die(mysql_error()); //choose the database to store our stuff
	
	if (!$db_con) { //just checking to make sure that we're connected
		die('Could not connect to SQL Database');
	}
	return $db_con;
}

function Disconnect($db)
{
	mysql_close($db);//Close the connection to the database
}

?>
