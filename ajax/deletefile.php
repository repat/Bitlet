<?

$fid = $_POST['fid'];

error_log('deleting file '.$fid);
DeleteFile($fid);

echo json_encode(array('success'=>true));

?>
