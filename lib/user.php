<?

// get the uid of user based on his email, also links up facebook id
function GetUID($email)
{
	$email = mysql_real_escape_string($email);

	//Query the user database and see if the user already has an account
	$result = mysql_query("SELECT id FROM users WHERE email = '$email'") 
		or die('Cannot execute find email '.$email);
	if(mysql_num_rows($result) == 0) {
		// if no email found, return false
		return false;
	}
	// return first row
	return mysql_result($result, 0);
}

function NewUser($email, $name='', $pass='')
{
	//create new user
	$salt = substr(md5(rand()), 0, 8); 

	// if no password passed in, generate a new one
	if($pass == '') {
		$pass = substr(md5(rand()), 0, 8); 
	}

	$hashed_pass = sha1($pass.$salt);
	mysql_query("INSERT INTO users (email, name, password, salt, credits)
		VALUES ('$email', '$name', '$hashed_pass', '$salt', '0')") 
		or die('Cannot make new user with email '.$email);
	// return id and password
	return array(mysql_insert_id(), $pass);
}

// set the user password - used to change password
function SetUserPassword($uid, $pass)
{
	$salt = substr(md5(rand()), 0, 8); 
	$hashed_pass = sha1($pass.$salt);
	mysql_query("UPDATE users SET password='$hashed_pass', salt='$salt' WHERE id='$uid'") 
		or die('Cannot set password, uid='.$uid);
}

//check the users password to see if it's correct
function ValidatePassword($uid, $pass){
	$result = mysql_query("SELECT salt, password FROM users WHERE id = '$uid'") or die('error validating pass');
	// check if correct result found
	if(mysql_num_rows($result) < 1) {
		error_log('No result found for uid'.$uid);
		return false;
	} else {
		$res = mysql_fetch_assoc($result);
		$hash_pass = $res['password'];
		$salt = $res['salt'];

		// hash password and check validity 
		if(sha1($pass.$salt) == $hash_pass) {
			return true;
		} else {
			error_log('Password incorrect');
			return false;
		}
	}
}

function ResetPassword($uid)
{
	//generate random password		
	$pass = substr(md5(rand()), 0, 8); 
	//setting the users password
	SetUserPassword($uid, $pass);
	return $pass;
}

// set the user display name
function SetUserName($uid, $name)
{
	$name = mysql_real_escape_string($name);
	mysql_query("UPDATE users SET name='$name'
		WHERE id='$uid'") or die('Cannot set username, uid='.$uid);
}

// get user display name
function GetUserName($uid)
{
	$result = mysql_query("SELECT name FROM users WHERE id='$uid'") 
		or die('Cannot get user name, uid='.$uid);
	return mysql_result($result, 0);
}

// get user email
function GetUserEmail($uid)
{
	$result = mysql_query("SELECT email FROM users WHERE id='$uid'") 
		or die('Cannot get email, uid='.$uid);
	return mysql_result($result, 0);
}

//Check if email exists
function CheckUserEmail($email)
{
	$result = mysql_query("SELECT id FROM users WHERE email='$email'")
		or die('Cannot find account in our Database, email='.$email);
	if(mysql_num_rows($result) < 1) {
		error_log('No result found for email= '.$email);
		return false;	
	} else {
		return mysql_result($result, 0);
	}	
}
// get all the user info
function GetUserInfo($uid)
{
	$result = mysql_query("SELECT * FROM users WHERE id='$uid'") 
		or die('Cannot get user info, uid='.$uid);
	return mysql_fetch_assoc($result);
}

// show how much money a user has left
function GetCredits($uid)
{
	$result = mysql_query("SELECT credits FROM users WHERE id='$uid'") 
		or die('Cannot get user credits, uid='.$uid);
	return mysql_result($result, 0);
}

// update the users settings
function UpdateUserSettings($uid, $email, $name, $phone, $website, $bio, $emailSettings){
	
	
	$email = mysql_real_escape_string($email);
	$name = mysql_real_escape_string($name);
	$phone = mysql_real_escape_string($phone);
	$website = mysql_real_escape_string($website);
	$bio = mysql_real_escape_string($bio);
	$emailSettings = mysql_real_escape_string($emailSettings);
	error_log("in the mysql function");	
	mysql_query("UPDATE users SET name='$name', phone='$phone', website='$website', bio='$bio', email_settings='$emailSettings'
		WHERE id='$uid'") or die('Cannot update User, uid='.$uid);
	error_log("in the mysql function");	
	
}
?>
