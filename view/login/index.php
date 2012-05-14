<?
//This stuff in PHP is from the buy page!
/////
/////
////
include 'lib/db.php';

$fid = $args;
$db = Connect();

$finfo = GetFileInfo($fid);
$name = basename($finfo['name']);
$price = $finfo['price'];
$downloads = $finfo['downloads'];
$uid = $finfo['uid'];

$uinfo = GetUserInfo($uid);
$user = $uinfo['email'];

Disconnect($db);

?>

<div class="container">
	<div class="row">
		<div class="span4 offset4">
			<div class="well">
				<h1>Login</h1>
				<hr>
				<form action="" method="POST" id="login-form">
					<div>
						<input type="text" size="10" autocomplete="off" class="bitlet-login login-email" placeholder="Bit@bitlet.co"/>
						<input type="text" size="10" autocomplete="off" class="bitlet-login login-password" placeholder="Password"/>
					<p class="forgot-password-login"><a href="">Forgot Password?</a></p>	
					<button type="submit" class="bitlet-login-submitbtn btn-large submit-button btn btn-success">Login</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>
