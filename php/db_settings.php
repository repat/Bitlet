<?php

	function Connect()
	{
		$db_host = "mysql.simply.io";
		$db_dbname = "bitlet_simplyio";
		$db_username ="dzz0615";
		$db_password ="zhang1234";

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
