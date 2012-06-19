<?

$email = $_POST['email'];
$UID = GetUID($email);
if($UID == false) {
	// create a new user
	list($UID, $pass) = NewUser($email);

	error_log('new user created, pass '.$pass);
	EmailNewUser($email, $pass);

	// auto login 
	$_SESSION['uid'] = $UID;
	echo json_encode(array('success'=>true));
} else {
	// email already exists
	echo json_encode(array('success'=>false));
}

?>
