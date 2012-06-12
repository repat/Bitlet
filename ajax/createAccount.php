<?
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];	

	// first check if the email already exists
	if(GetUID($email) != false) {
		echo json_encode(array("success"=>false));
		return;
	}

	// create new user
	list($uid, $dummyPass) = NewUser($email, $name, $pass);	
	
	$_SESSION['uid'] = $uid;
	$UID = $uid;
	EmailNewCreatedAccount($email, $password, $name);	
	echo json_encode(array("success"=>true));
	return;
?>
