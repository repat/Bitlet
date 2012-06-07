<?
	$email = $_POST['email'];

	$uid = CheckUserEmail($email);
	//check if the persons email validated and then reset or return error
	error_log('the uid is '.$uid);
	if($uid == null) {
		error_log('Returning False to reset-details.js');
		echo json_encode(array("success"=>false));
	} else{
		$name = GetUserName($uid);	
		//generate random password		
		$pass = substr(md5(rand()), 0, 8); 
		//setting the users password
		SetUserPassword($uid, $pass);
		EmailPasswordReset($email, $pass, $name);
		echo json_encode(array("success"=>true));
	}
?>
