<?

// grab the fid from javascript
$fid = $_POST['fid'];
error_log('item detail fid:'.$fid);

$ret = BuildProductItemDetails('test', 'test.png', 1500000, 3.14, '', 'this is a very cool picture of nothing', 'photo',
'http://bitlet.co/2234f', 'blah');

// return AJAX
echo $ret;

?>
