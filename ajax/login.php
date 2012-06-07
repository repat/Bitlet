<?

$email = $_POST['email'];
$pass = $_POST['pass'];

$res = Authenticate($email, $pass);

if($res == false) {
	echo json_encode(array("success"=>false));
} else {
	// set this session as logged in
	$_SESSION['uid'] = $res;
	$UID = $res;
	echo json_encode(array("success"=>true));
}

?>
