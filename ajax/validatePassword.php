<?
	$uid = $UID;
	$pass = $_POST['checkpass'];
	$validpass = validatePassword($uid, $pass);
	error_log($validpass);
	if($validpass == false) {
		error_log('Returning False');
		echo json_encode(array("success"=>false));
	} else {
		echo json_encode(array("success"=>true));
	}
?>
