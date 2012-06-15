<?
	$email = $_POST['email'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$website = $_POST['website'];
	$bio = $_POST['bio'];
	$emailPurchase = $_POST['emailPurchase'];
	$emailWeekly = $_POST['emailWeekly'];

	$emailSettingsArray = array(
		"EmailOnPurchase" => "$emailPurchase",
		"EmailOnWeekly" => "$emailWeekly",
	);
	$emailSettings = ReverseParseStr($emailSettingsArray);
	$uid = $UID;

	
	//check if the persons email validated then update account 
	error_log('the uid is '.$uid);
	if($uid == null) {
		error_log('Returning False');
		echo json_encode(array("success"=>false));
	} else {
		UpdateUserSettings($uid, $email, $name, $phone, $website, $bio, $emailSettings);	
		echo json_encode(array("success"=>true));
	}
?>
