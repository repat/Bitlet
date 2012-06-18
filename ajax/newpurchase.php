<?

// handle file purchasing in the backend
// Note this is called after the credit card is processed, assuming payment went through

$email = $_POST['email'];
$fid = $_POST['fid'];
$token = $_POST['token'];	// stripe token

error_log('purchasing '.$fid.' with '.$email);
// process the buy
$ret = PurchaseFile($email, $fid);
echo json_encode(array('success'=>$ret));

?>
