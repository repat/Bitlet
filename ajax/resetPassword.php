<?
	$email = $_POST['email'];

	$uid = CheckUserEmail($email);
	//check if the persons email validated and then reset or return error
	error_log('the uid is '.$uid);
	if($uid == null) {
		error_log('Returning False to reset-details.js');
		echo json_encode(array("success"=>false));
	} else {
		$name = GetUserName($uid);	
		$pass = ResetPassword($uid);
		EmailPasswordReset($email, $pass, $name);
		echo json_encode(array("success"=>true));
	}
?>
