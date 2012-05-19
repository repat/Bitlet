<?
//This stuff in PHP is from the buy page!
/////
/////
////

$fid = $args;

$finfo = GetFileInfo($fid);
$name = basename($finfo['name']);
$price = $finfo['price'];
$downloads = $finfo['downloads'];
$uid = $finfo['uid'];

$uinfo = GetUserInfo($uid);
$user = $uinfo['email'];

?>

<input type="text" size="10" autocomplete="on" class="bitlet-login login-email" placeholder="Bit@bitlet.co"/>
<input type="text" size="10" autocomplete="off" class="bitlet-login login-password" placeholder="Password"/>
<div>
	<p class="forgot-password-login"><a href="#">Forgot Password?</a></p>
</div>	
