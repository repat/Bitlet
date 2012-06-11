<?
	$email = $_POST['email'];

	$uid = CheckUserEmail($email);
	//check if the persons email validated and then reset or return error
	error_log('the uid is '.$uid);
	if($uid == null) {
		//error_log('Returning False to create-acount.js');
		echo json_encode(array("success"=>true));
	} else{
		//error_log('Returning True to create-acount.js');
		echo json_encode(array("success"=>false));
	}
?>
