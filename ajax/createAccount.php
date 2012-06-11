<?
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];	

	list($uid, $dummyPass) = GetUID($email);	
	SetUserName($uid, $name);
	SetUserPassword($uid, $password);
	
	if($uid == null) {
		echo json_encode(array("success"=>false));
	} else{
		$_SESSION['uid'] = $uid;
		$UID = $uid;
		EmailNewCreatedAccount($email, $password, $name);	
		echo json_encode(array("success"=>true));
	}
?>
