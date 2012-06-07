<?
	$email = $_POST['email'];

	$uid = CheckUserEmail($email);
	$name = GetUserName($uid);	
	//check if the persons email validated and then reset or return error
	if($uid === false) {
		echo json_encode(array("success"=>false));
	} else{
		//generate random password		
		$pass = substr(md5(rand()), 0, 8); 
		//setting the users password
		SetUserPassword($uid, $pass);
		EmailPasswordReset($email, $pass, $name);
		echo json_encode(array("success"=>true));
	}
?>
