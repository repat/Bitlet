<?

// reset UID and kill the session
$_SESSION['uid'] = -1;
$UID = -1;
session_destroy();

echo json_encode(array('success'=>true));

?>
