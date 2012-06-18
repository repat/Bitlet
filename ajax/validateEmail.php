<?
	$email = $_POST['email'];

	$uid = CheckUserEmail($email);
	//check if the persons email validated and then reset or return error
	error_log('the uid is '.$uid);
	if($uid === false) {
		echo json_encode(array("success"=>false));
	} else{
		echo json_encode(array("success"=>true));
	}
?>
