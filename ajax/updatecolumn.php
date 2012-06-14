<?

// TODO save the thumb and name it the same name as orginal thumb

// grab data from form
$fid = $_POST['fid'];
$ret = SetFileDetails($fid, $_POST);

// return AJAX
echo json_encode(array('success'=>$ret));

?>
