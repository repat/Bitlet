<?
	$uid = $UID;
	$pass = $_POST['newPassword'];
	error_log('the uid is '.$uid);

	if($uid == null) {
		error_log('Returning False');
		echo json_encode(array("success"=>false));
	} else {
		SetUserPassword($uid, $pass);
		echo json_encode(array("success"=>true));
	}
?>
