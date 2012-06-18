<?

// handle file purchasing in the backend
// Note this is called after the credit card is processed, assuming payment went through

$email = $_POST['email'];
$fid = $_POST['fid'];

// process the buy
$ret = PurchaseFile($email, $fid);
echo json_encode(array('success'=>$ret));

?>
