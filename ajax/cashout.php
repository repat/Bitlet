<?

$uid = $_POST['uid'];
$street = $_POST['street'];
$city = $_POST['city'];
$zip = $_POST['zip'];

$out = $uid.'|'.$street.'|'.$city.'|'.$zip;
error_log($out);

// write the data to a text file... yes, a text file
$sh = 'echo "'.$out.'" >> cashout.txt';
`$sh`;

?>
<h1>Done! Weeeeee!</h1>
<br>
<a href="/dashboard">Go Back</a>
