<?

$fid = $_POST['fid'];

DeleteFile($fid);

echo json_encode(array('success'=>true));

?>
