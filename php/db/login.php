<?php
	include 'db-settings.php';  //load the DB Settings.
	
	

	$db_con = mysql_connect($db_host, $db_username, $db_password) or die('Could not connect: ' . mysql_error());//connect to the database server
	mysql_select_db($db_dbname, $db_con) or die(mysql_error()); //choose the database to store our stuff
	echo "Ready for take off";
	
	if ($db_con)//just checking to make sure that we're connected
	{

			$fbid = "1476421336";
			//echo $fbid;
			$fbname = "Zach Zimbler";
			//echo $fbname;
			$fbgender = "male";
			//echo $fbgender;
			$fbemail = "zztopser@gmail.com";
			//echo $fbemail;
			$fblink = "http://www.facebook.com/zzimbler";
			//echo $fblink;
			$login_timestamp = time();
			echo $login_timestamp;
	
		
			//Query the user database and see if the user already has an account
			$check_user = mysql_query("SELECT fbid FROM users WHERE fbid = '$fbid'", $db_con);
			echo $check_user;
			if (!$check_user) {
		    	//create new user
				mysql_query("INSERT INTO users (fbid, fbname, fbemail, lastlogon, fblink, fbgender) 
				VALUES ('$fbid', '$fbname', '$fbemail', '$login_timestamp', '$fblink', '$fbgender')");
				echo "created new user";
			}
			else{
				//Update the last Logon for the user
				mysql_query("UPDATE users SET lastlogon = '$login_timestamp'
				WHERE fbid = '$fbid'");
				echo "updated the last logon";
			}
				
	}
	
	mysql_close($db_con);//Close the connection to the database

?>